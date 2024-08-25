<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Mediator;
use App\Models\Neighborhood;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MediatorController extends Controller
{
    // العرض
    public function getAllMed(){  
      if (Auth::check() ){
        // $mediator = Mediator::with('neighborhood')->get(); 
        $neighborhood = Neighborhood::get();
        $ben_count= Mediator::with('neighborhood')->get();
        $mediator = User::with('mediator')->whereHas(
          'roles', function($q){
              $q->where('name', 'mediator');
          }
      )->get();
        return view('mediator' ,compact('neighborhood','mediator','ben_count'));
        // return response()->json($mediator);
      }
      else 
      return view('auth.login');
  
  
        }
  
        public function create (){
          if (Auth::check()){
          $neighborhood = Neighborhood::get();
          return view('addMediator')
          ->with(['neighborhood'=>$neighborhood]); 
          }
          else 
          return view('auth.login');
    
  
      }
      public function store( Request $request){
  
          //التحقق من البيانات قبل اضافتها لقاعدة البيانات
          $validator = $request->validate([
          'med_name'=> 'required |unique:mediators,med_name',
          'med_phone'=> 'required| min:9 |unique:mediators,med_phone',
          'med_cardnum'=> 'required| min:11 |unique:mediators,med_cardnum' ,
          'username' => 'unique:users,username',
          'neigh_id'=>'required',
          // 'user_name'=>'required |unique:users,user_name',
         
          ]);
  
          $mediator = new Mediator(); //   هذا الاوبجت هو الذي يحتوي البيانات التي سوف تنضاف لقاعدة البيانات
          $user = new User();
        
          $password = Hash::make($request->input('med_phone'));

          $user->username=$request->input('med_cardnum');// add cardnum to username column
          $user->name=$request->input('med_name');// add med name to name column
          $user->password=$password;// add med phone to password column
          $user->cnf_password=$request->input('med_phone');
          $user->save();

        // اضافة صلاحية الوسيط لهذا المستخدم

          $user->attachRole('mediator');

  
         
          // عملية الاضافة 

          
          $user_id =DB::table('users')->orderBy('id', 'DESC')->first();
          $mediator->user_id= $user_id->id ;
          // $mediator->med_name= $request->input('med_name');
          $mediator->med_phone= $request->input('med_phone');
          $mediator->med_cardnum= $request->input('med_cardnum');
          $mediator->neigh_id= $request->input('neigh_id');
        
        
        
          // عملية الحفظ 
          $mediator->save();
          // $user->save();
  
          //العودة الى واجهة عرض الوسطاء
          return redirect('mediator')-> with(['add_success' => __('الإضـافـة')]);
      }


      // طريقه الحذف 
       public function delete($med_id){
  
        $user= User::find($med_id); 
        $user->detachRole('mediator');
        $user->attachRole('disable');

        return redirect('mediator')-> with(['delete_success'=> __('الحـــذف ')]);
       }
  
  
         //كود التعديل
         public function editmed(Request $request){
          
           
        $update =[
          // 'med_name' => $request->input('med_name'),
          'med_phone' => $request->input('med_phone'),
          'med_cardnum' => $request->input('med_cardnum'),
          'neigh_id'=> $request->input('neigh_id'),
        ];


        $password = Hash::make($request->input('med_phone'));


        $updatename =[
            'name' => $request->input('med_name'),
            'password'=>$password,
            'username'=>$request->input('med_cardnum'),
            'cnf_password'=>$request->input('med_phone')
        ];
       
        DB::table('mediators')->where('med_id',$request->med_id)->update($update);
        DB::table('users')->where('id',$request->user_id)->update($updatename);

        return redirect('mediator')-> with(['update_success' => __('التعديـل')]);
       }
  

       //search
       public function search(){

        $search_text = $_GET['query'];
        $mediator = Mediator::where('med_name','LIKE','%'.$search_text.'%')
        ->orwhere('med_phone','LIKE','%'.$search_text.'%')
        ->orwhere('med_cardnum','LIKE','%'.$search_text.'%')
        ->with('neighborhood')
        ->get();
  
        $neighborhood = Neighborhood::get();
  
        return view('search.searchMed',compact('mediator','neighborhood'));
       }


      


       //تأكيد الأحقية
       public function getBen(){

        $id= auth()->user()->id;
        $med = Mediator::with('user')->where('user_id',$id)->first();
        $ben = $med->beneficiaries->where('allowed_in_month','1');

       $id= auth()->user()->id;
       $med = Mediator::with('user')->where('user_id',$id)->first();
       $neigh= Neighborhood::where('neigh_id',$med->neigh_id)->get();
      // return response()->json($ben);
       return view('confBen',compact('ben','neigh'));

       }

// عرض كافة المستفيدين التابعين للوسيط المسجل
       public function allBen(){
         
        $id= auth()->user()->id;
        $med = Mediator::with('user')->where('user_id',$id)->first();
        $ben = $med->beneficiaries->where('allowed_in_month','<>','1');
      // return response()->json($ben);
       return view('showBenMed',compact('ben'));

       }

       public function addBenView (){
       

        if (Auth::check()){
          $id= auth()->user()->id;
          $med = Mediator::with('user')->where('user_id',$id)->first();
          $neigh= Neighborhood::where('neigh_id',$med->neigh_id)->first();
          // $n = Neighborhood::where($med->neigh_id,$neigh->neigh_id);
        // return response()->json($neigh);

    //     $neighborhood = Neighborhood::where('neigh_id')->get();
        return view('addBenMed', compact('neigh')); 
       }
        else 
       return view('auth.login');

    }



    public function addben(Request $request){
  //التحقق من البيانات قبل اضافتها لقاعدة البيانات
  $validator = $request->validate([
    // 'name'=> 'required |unique:users,name',
    'ben_phone'=> 'required| min:9 |unique:beneficiaries,ben_phone',
    'ben_cardnum'=> 'required | min:11 |unique:beneficiaries,ben_cardnum',
    'neigh_id'=>'required',
    'allowed_in_month'=> 'required',
    'username'=>'unique:users,username',
    'neigh_id'=>'required',

    ]);

    $beneficiary = new Beneficiary(); //   هذا الاوبجت هو الذي يحتوي البيانات التي سوف تنضاف لقاعدة البيانات
    $user = new User();
   
    // عملية الاضافة 
    // $beneficiary->ben_name->input('ben_name');
    $password = Hash::make($request->input('ben_phone'));

    $user->username=$request->input('ben_cardnum');// add cardnum to username column
    $user->name=$request->input('ben_name');// add ben name to name column
    $user->password=$password;// add ben phone to password column
    $user->cnf_password=$request->input('ben_phone');
    $user->user_type_id= 2;// add ben phone to password column

    $user->save(); 

    // اضافة صلاحية المستفيد لهذا المستخدم
    $user->attachRole('beneficiary');

    

    $user_id =DB::table('users')->orderBy('id', 'DESC')->first();
    $beneficiary->user_id= $user_id->id ;
    $beneficiary->ben_phone= $request->input('ben_phone');
    $beneficiary->ben_cardnum= $request->input('ben_cardnum');
    $beneficiary->neigh_id= $request->input('neigh_id');
    // $beneficiary->ben_degree_need= $request->input('ben_degree_need');
    $beneficiary->allowed_in_month= $request->input('allowed_in_month');
 
    // عملية الحفظ 
    $beneficiary->save();


      //العودة الى واجهة عرض المستفيدين
      return redirect('allBen')-> with(['add_success' => __('الإضـافـة')]);
}


public function editbenmed(Request $request){
  // $validator = $request->validate([
  //     'ben_name'=> 'required ',
  //     'ben_phone'=> 'required ',
  //     'ben_cardnum'=> 'required',
  //     'neigh_id'=>'required',
  //     'ben_degree_need'=> 'required'
  //  ]);
   
$update =[
  // 'ben_name' => $request->input('ben_name'),
  // 'ben_phone' => $request->input('ben_phone'),
  // 'ben_cardnum' => $request->input('ben_cardnum'),
  // 'neigh_id'=> $request->input('neigh_id'),
  'allowed_in_month'=> $request->input('allowed_in_month')
];

$password = Hash::make($request->input('ben_phone'));


// $updatename =[
//     'name' => $request->input('ben_name'),
//     'password'=>$password,
//     'username'=>$request->input('ben_cardnum'),
//    'cnf_password'=>$request->input('ben_phone')

// ];

DB::table('beneficiaries')->where('id',$request->id)->update($update);
// DB::table('users')->where('id',$request->user_id)->update($updatename);
return redirect('confben')-> with(['update_success' => __('التعديـل')]);
}

}