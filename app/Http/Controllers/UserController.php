<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class UserController extends Controller
{
    //
public function getuser(){
    if (Auth::check()){
        $usertype= User::get();
        // return response()->json($usertype);
        // if ($usertype->user_type_id =='2'){
        //     $usertype->attachRole('donor');
        // }
        $user = User ::with('roles')->get();  
        return view('user',compact('user'));
        }
        else 
        return view('auth.login');
}


// دالة عرض واجهة الاضافة 

public function create (){
    if (Auth::check()){
  
    $role = Role::get();
     return view('addUser',compact('role'));
    
    //  ->with(['category'=>$category]); 
    }
    else
    return view('auth.login');
  
     
    }
    public function store( Request $request){

        //التحقق من البيانات قبل اضافتها لقاعدة البيانات
        $validator = $request->validate([
        'username'=> 'required | unique:users,username',
        'password'=>'required| min:8'
        ]);
        $password = Hash::make($request->input('password'));

        $user= new User(); //   هذا الاوبجت هو الذي يحتوي البيانات التي سوف تنضاف لقاعدة البيانات
        // عملية الاضافة 
        
        $user->username= $request->input('username');
        $user->name= $request->input('name');
        $user->password=$password;
        $user->cnf_password=$request->input('password');
        $user->save();
        if($request->input('role_id')==0){
            $user->attachRole('admin');
        }
        else
        if($request->input('role_id')==1){
            $user->attachRole('donor');
        }
        else
        if($request->input('role_id')==2){
            $user->attachRole('beneficiary');
        }
        else
        $user->attachRole('mediator');

        // عملية الحفظ 
        return redirect('user')-> with(['add_success' => __('الإضـافـة')]);
    
    }

    public function edituser(Request $request){
        $user = User::find($request->id);
        $password = Hash::make($request->input('password'));
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password=$password;
        $user->cnf_password=$request->input('password');
        $user->save();
        $user->roles()->sync([$request->input('role_id')]);
        // if($request->input('role_id')==0){
        //     $user->roles()->sync([$request->input('role_id')]);
        //     // $role= $user->attachRole('admin');
        // }
    //     else
    //     if($request->input('role_id')==1){
    //         $role= $user->attachRole('donor');
    //      }
    //     else
       
    //     else
    //    $role= $user->attachRole('mediator');

      
        // $update =[
        //     'name' => $request->input('name'),
        //     'username'=>$request->input('username'),
        //     'cnf_password'=>$request->input('password'),
           
            
        // ];
       
        // DB::table('users')->where('id',$request->id)->update($update); 
        return redirect('user')-> with(['update_success' => __('التعـديـل')]);

    
    }

    public function delete($id){

        $user= User::with('roles')->find($id); 
        $user->delete();
        return redirect('user')-> with(['update_success' => __('الغاء التفعيل')]);

        // $role = Role::with('user');
        // if($user->hasRole('mediator')){
        // $user->detachRole('mediator');
        // $user->attachRole('disable');
        // }
        // else
        // if($user->hasRole('donor')){
        //     $user->detachRole('donor');
        //     $user->attachRole('disable');
        // }
        // else
        // if($user->hasRole('beneficiary')){
        //     $user->detachRole('beneficiary');
        //     $user->attachRole('disable');
    
        // }
        // else {
        // if($user->hasRole('beneficiary')){
        // $user->detachRole('admin');
        // $user->attachRole('disable');
        // }
    }
        
    
        // return response()->json($user);

       }
     

    

