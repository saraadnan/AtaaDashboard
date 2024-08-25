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

class BeneficiaryController extends Controller
{
     // العرض
     public function getAllBen(){ 
       // التأكد من المستخدم مسجل دخول لعرض واجهة كافة المستفيدين
      if (Auth::check()){

        if (Auth::check() ){
          // $mediator = Mediator::with('neighborhood')->get(); 
          $neighborhood = Neighborhood::get();
          // $ben_count= Mediator::with('neighborhood')->get();
          $beneficiary = User::with('beneficiary')->whereHas(
            'roles', function($q){
                $q->where('name', 'beneficiary');
            }
        )->get();
          return view('beneficiary' ,compact('beneficiary','neighborhood'));
          // return response()->json($beneficiary);
        }
        else 
        return view('auth.login');
    
      // $beneficiary = Beneficiary::with('neighborhood')->get(); 
      // $neighborhood = Neighborhood::get();
      // $username= Beneficiary::with('user')->get();
      //   // return response()->json($username);
      // return view('beneficiary' ,compact('neighborhood','beneficiary','username'));
      // }
      // // اذا لم يكن مسجل تعرض له واجهة تسجيل الدخول
      // else 
      //  return view('auth.login');


      }
    }

      public function create (){
        
        if (Auth::check()){

        $neighborhood = Neighborhood::get();
        return view('addBeneficiary', compact('neighborhood')); 
        }
        else 
       return view('auth.login');

    }
    public function store( Request $request){

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
        return redirect('beneficiary')-> with(['add_success' => __('الإضـافـة')]);
    }



    // طريقه الحذف 
     public function delete($id ){

      $user= User::find($id); 
      $user->detachRole('beneficiary');
      $user->attachRole('disable');
      return redirect('beneficiary')-> with(['delete_success'=> __('الحـــذف ')]);
     }


       //كود التعديل
       public function editben(Request $request){
        // $validator = $request->validate([
        //     'ben_name'=> 'required ',
        //     'ben_phone'=> 'required ',
        //     'ben_cardnum'=> 'required',
        //     'neigh_id'=>'required',
        //     'ben_degree_need'=> 'required'
        //  ]);
         
      $update =[
        // 'ben_name' => $request->input('ben_name'),
        'ben_phone' => $request->input('ben_phone'),
        'ben_cardnum' => $request->input('ben_cardnum'),
        'neigh_id'=> $request->input('neigh_id'),
        'allowed_in_month'=> $request->input('allowed_in_month')
      ];

      $password = Hash::make($request->input('ben_phone'));


      $updatename =[
          'name' => $request->input('ben_name'),
          'password'=>$password,
          'username'=>$request->input('ben_cardnum'),
           'cnf_password'=>$request->input('ben_phone')

      ];
     
      DB::table('beneficiaries')->where('id',$request->id)->update($update);
      DB::table('users')->where('id',$request->user_id)->update($updatename);
      return redirect('beneficiary')-> with(['update_success' => __('التعديـل')]);
     }


     public function user()
     {
         $user= User::with('beneficiary')->find(1);
         return response()->json($user);
     }


     //search
     public function search(){

      $search_text = $_GET['query'];
      // $beneficiary = Beneficiary::where('user_name','LIKE','%'.$search_text.'%')
      $beneficiary = Beneficiary::where('ben_phone','LIKE','%'.$search_text.'%')
      ->orwhere('ben_cardnum','LIKE','%'.$search_text.'%')
      ->with('neighborhood')
      ->get();

      $neighborhood = Neighborhood::get();

      return view('search.searchBen',compact('beneficiary','neighborhood'));
     }
}
