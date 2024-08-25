<?php
namespace App\Http\Controllers\API;
use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Donation;
use App\Models\User;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Mail;
use App\Mail\PasswordReset;
use App\Models\UserType;
use App\Http\Controllers\API\JobsContoller;
use App\Models\Beneficiarie;
use App\Models\Beneficiary;
use App\Models\Reservation;

use function GuzzleHttp\Promise\all;

class UsersController extends Controller
{

    ////////////////////login///////////////////
    public function login(Request $request){
        if (Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
            $user = Auth::user();
            return response()->json([
              'success' => true,
              //'token' => $success,
               'user' => $user
          ]);
        }else{
       //if authentication is unsuccessfull, notice how I return json parameters
          return response()->json([
            'success' => false,
            'message' => 'Invalid UserName or Passwordeee',
        ], 401);
        }}


//////////////عرض بيانات المستفيد مع بيانات الوسيط حسب منطقته///
public function MyData($user_id){
    $beneficiarie=Beneficiary::with('mediator')->with('neighborhood')->where('user_id',$user_id)
    ->where('neigh_id','>=',0)->orderBy('id','desc')
    ->get();
  //  return response($res);
    return response()->json($beneficiarie);
        }



public function userBen($id)
{
    $user=User::with('beneficiarie')->find($id);
    ///////////عرض الاسم ورقم المستخدم////
    // echo $user->username."<br>";
    // echo $user->id."<br>";
    
     return response()->json($user);
}

    //////////////ادخال بيانات التسجيل الجديد///register///////////////
    public function register(Request $request){
       if($plainPassword=$request->password){
        $password=bcrypt($request->password,);
        $request->request->add(['password' => $password]);
        // create the user account 
        $created=User::create($request->all());
        $request->request->add(['password' => $plainPassword]);
    
        return response()->json([
            'success' => true,
            //'token' => $success,
              'password' => $password
        ]);
      }else{
     //if authentication is unsuccessfull, notice how I return json parameters
        return response()->json([
          'success' => false,
          'message' => 'Invalid',
      ], 401);
      }}
    //     return $this->login($request);
    //    // return ($request);
 


     /////////////////ادخال باقي بيانات المستفيدregister///////////////
     public function beneficiaries(Request $request){
        $id=$request->id;
        $created=Beneficiary::create($request->all());
        $request->request->add(['id' => $id]);
        //   return $this->login($request);
          return response()->json([
            'success' => true,
            //'token' => $success,
              'request' => $request
        ]);
    }


/////////////////////////logout///////////////
    public function logout(Request $request)
    { 
        if(!User::checkToken($request))
         {
             return response()->json([
              'message' => 'Token is required',
             'success' => true,
             ],422);
         }
        try {
            Auth::invalidata(Auth::parseToken($request->user));
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (Auth $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    ////////////////////التحقق من نوع نوع المستخدم///////////////
public function Checkusertype($user_id,$user_typ_id){
    $allowed=User::
    select('user_type_id')//->where('allowed_in_month','<=',1)
    ->where('id',$user_id)
    ->where('user_type_id',$user_typ_id)
    ->first();
    if($allowed <> '9'){
        return response()->json([
            'success' => $allowed,
            // 'user' => $allowed
        ]);
        return response()->json([
          'success' => false,
          'user' => $allowed
          //'message' => 'Invalid Email or Password',
      ], 401);
}
 }

}
