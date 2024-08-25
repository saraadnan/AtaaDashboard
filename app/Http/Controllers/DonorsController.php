<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DonorsController extends Controller
{
    //
    
//دالة عرض جميع المتبرعين
    public function getAllDonors(){

        if (Auth::check()){
            $user= User::whereHas(
                'roles', function($q){
                    $q->where('name', 'donor');
                }
            )->get();

            // $c = Donation::with('user')->whereIn('user_id','id')->get();
            // return response()->json($c);
            return view('donors') 
            -> with ('user', $user);
   
            }
        else 
        return view('auth.login');
 
    }
    public function create (){
        if (Auth::check()){
        return view('addDonor');
        }
        else 
        return view('auth.login');


    }
    public function store( Request $request){

        //التحقق من البيانات قبل اضافتها لقاعدة البيانات
        $validator = $request->validate([
        'name'=> 'required ',
        'username'=>'required | unique:users,username',
        'password'=>'required| min:8'
        ]);
        $user = new User(); //   هذا الاوبجت هو الذي يحتوي البيانات التي سوف تنضاف لقاعدة البيانات
        // عملية الاضافة 
        $password = Hash::make($request->input('password'));
        $user->name= $request->input('name');
        $user->username= $request->input('username');
        $user->password= $password;
        $user->cnf_password=$request->input('password');
        // عملية الحفظ 
        $user->save();

        $user->attachRole('donor');

        //العودة الى واجهة عرض المتبرعين
        return redirect('donors')-> with(['add_success' => __('الإضـافـة')]);
    }

     //طريقه الحذف 
    public function delete($id){

    $user= User::find($id); 
    $user->detachRole('donor');
    $user->attachRole('disable');
    
    return redirect('donors')-> with(['delete_success'=> __('الحـــذف ')]);
   }

   // كود التعديل
   public function editdonor(Request $request){
     $validator = $request->validate([
      'name'=> 'required' 
      ]);
      
   $update =[
    'name' => $request->name,
    // 'donor_last_name' => $request->donor_last_name
   ];
  
   DB::table('users')->where('id',$request->id)->update($update);
   return redirect('donors')-> with(['update_success' => __('التعديـل')]);
  }

  //search
  public function search(){

    $search_text = $_GET['query'];
    $donor = Donor::where('donor_name','LIKE','%'.$search_text.'%')
    ->get();

    return view('search.searchDonor',compact('donor'));
   }

}
