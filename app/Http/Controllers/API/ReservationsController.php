<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Beneficiarie;
use App\Models\Beneficiary;
use App\Models\Category;
use App\Models\Directorate;
use App\Models\Donation;
use App\Models\Governorate;
use App\Models\Mediator;
use App\Models\Neighborhood;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    //
    //public function index($dontion_id,$ben_id){
        public function index($dontion_id,$ben_id){
        $res=new Reservation();
        $now = Carbon::now();
        
        $res->res_donr_id=$dontion_id;
        $res->res_user_id=$ben_id;
        $res->res_month_id=$now->month;
        if($res->save())
        
        return response()->json([
            'success' => true,
            //'reservation' => $res
        ]);
        return response()->json([
          'success' => false,
          //'message' => 'Invalid Email or Password',
      ], 401);
    //return response()->json($res);
        // return response(array(
        //    'mesasge'=>'added successful'));
        // return response(array('mesasge'=>'can not add data'));



        // $res=new Reservation();
        // $now = Carbon::now();
        
        // $res->res_donr_id=$dontion_id;
        // $res->res_user_id=$ben_id;
        // $res->res_month_id=$now->month;
        // if($res->save())
        // return response(array('mesasge'=>'added successful'));
        // return response(array('mesasge'=>'can not add data'));


    }


//// كود ربط واستدعاء بيانات الحجوزات مع بيانات التبرعات لعرضها في نافذة الحجوزات///
public function UserRes($user_id){
   // $now = Carbon::now();
    $now = Carbon::now()->addDays(2)->format('Y-m-d H:m:s');
    //   $createdat=Reservation::where('created_at','<>',0)->where('res_user_id',$user_id)->get();
$res=Reservation::with('donation_asl')->where('res_user_id',$user_id)
//->where('res_month_id',$now->month)// هذا الامر مخصص اذا كان سيتم ربطه بالشهر الحالي 
  ->where('delivery_conf',0)
// ->where('created_at','<',$now)///اخفاء التبرعات الغير محجوزة لمدة يومين من قائمة حجوزاتي من اجل اعادة اعلانها
->orderBy('res_id','desc')
->get();
 return($res);
//return($now);
}
public function Witing_donr_res_old2($user_idd){
     $med =Donation::with('user')->where('user_id',$user_idd)->first();
    $ben= $med->reservations->where('delivery_conf',0);
    // ->orderBy('donation_id','desc')
    // ->get();
    
    return response($ben);
}
/////////// تبرعات في انتظار تسليمها من المتبرع للمستفيد/غير جاهز
// public function Witing_donr_res($user_idd){
//     $res=Donation::with('reservation_asl')
//     // $res=Reservation::with('donation_asl')
//      ->where('user_id',$user_idd)
    
//    // ->where('delivery_conf',0)->orderBy('donation_id','desc')
//     ->orderBy('donation_id','desc')
//     ->get();

//     // $res=Donation::where('user_id',$user_idd)
//     // ->with('reservation_asl')->where('delivery_conf','=',0)
//     // ->get(); 
//     return response($res);  
// }
//  عرض التبرعات الغير محجوزة من قبل المستخدم مع اسم المحافظة
        public function Witing_donr_res($user_idd){
        
        $donation = Reservation::with(['donation_asl' => function ($q) use ($user_idd) 
        {
             $now = Carbon::now()->format('Y-m-d');
            // $q->with('donation_asl')->where('delivery_conf',0);
            $q
            // ->with('reservation_asl')
            ->where('user_id',$user_idd) 
            ->where('donation_exp','>',$now)///اخفاء المواد المنتهية
            ->orwhere('donation_exp','=',null)
            ->whereRaw('donation_quantity <> res_quantity')//اظهار التبرعات الغير محجوزة
            ->orderBy('donation_id','desc')
            ->get();
          }])
          
        //   ->whereDoesntHave('reservations' , function ($q) use ($user_idd){
  
        // $q->where('res_user_id',$user_idd);
  
        // })
        ->where('delivery_conf',0)
        ->orderBy('res_id','desc')
        
        
        ->get(); 
        return response()->json($donation);
  
      }
  
      





// public function getAllNotResA (){
//     // if (Auth::check()){

//         //جاهز لربط جدول التبرعات مع جدول الاصناف مع جدول المديريات
//         //  $res=Donation::with('directorate')->with('category')->where('res_quantity','0')->get(); 
    
//         // $res=Donation::with('directorate')->with('category')->whereRaw('donation_quantity <> res_quantity')->get(); 
//         $res=Donation::with('directorate')->with('category')->with('user')
//         ->whereRaw('donation_quantity <> res_quantity')
//         ->orderBy('donation_id','desc')->get(); 
//         return response($res); 
//     }
    
        // $res=Donation::whereRaw('donation_quantity <> res_quantity')
        
        // ->with('donation_asl')->where('delivery_conf',0)
        
        // ->get(); 
    
        // $res=Donation::where('res_user_id',$user_idd)->get();
        // $res=Reservation::with('donation_asl')
        // ->where('delivery_conf','=',0)->get();


        //$res3=Reservation::where('delivery_conf','=','0')->get();
    
    //   $donation = Donation::where('res_quantity','0')->get();  
    //   $directorate = Directorate::get();
    //   $category = Category::where('cat_id','>','0')->where('cat_id','<>','3')->get();
      // $count = Donation::with('reservations')->get();
      //return view('getAllNotRes' , with('donation','directorate','category')); //عرض الـ View  مع البيانات الراجعة في قاعدة البيانات في المتغير 
      
          //return view('getAllNotResA', compact('donation','donation_asl')); //عرض الـ View  مع البيانات الراجعة في قاعدة البيانات في المتغير 
    




public function govvvvv(){
  //  $now = Carbon::now();
$res=Governorate::with('directorate_asl')//->where('dir_id')
//->where('res_month_id',$now->month)// هذا الامر مخصص اذا كان سيتم ربطه بالشهر الحالي 
->where('gov_id','>',0)->orderBy('gov_id','desc')
->get();
return response($res);
}


public function joooooo(){
    DB::table('governorates')
            ->join('directorates', 'governorates.gov_id', '=', 'directorates.gov_id')
            ->join('neighborhoods', 'directorates.dir_id', '=', 'neighborhoods.dir_id')
            ->select('governorates.gov_id', 'directorates.dir_id', 'neighborhoods.dir_id')
            ->get();
}

///////////////////حجوزاتي///
public function my_res($user_id){
$res=Reservation::with('donation_asl')->where('res_user_id',$user_id)
->orderBy('res_id','desc')
->get();
return response($res);
}



 

    

    // public function UserRes($user_id){
    //     $now = Carbon::now();

    // $res=Reservation::with('donation_asl')->where('res_user_id',$user_id)
    // //->where('res_month_id',$now->month)
    // ->where('delivery_conf',0)
    // ->get();
    // return response($res);

    // }
    /////////////////اجمالي عدد الحجوزات التي تم حجزها في الشهر لكل مستفيد//////
    public function CundonRes($id, $monthid){
        $now = Carbon::now();
        $count =Reservation::where('res_user_id',$id)->where('res_month_id',$monthid)->count();
       // return response()->json($count);
        return response($count);
    }

 ///////// عرض عدد الحجوزات المسموح حجزها في الشهر حسب الحالة الحرجة//////
     public function allowedINmonth($user_id){
        $allowed =Beneficiary::where('user_id', $user_id)->get();
         // echo $allowed->allowed_in_month."<br>";
          return response()->json($allowed);
    }

/////////////////////استعراض الشهر الحالي حسب موقع قاعدة البيانات////
public function MonthNow(){
    $now = Carbon::now();
    $MONTHNOW=$now->month;
   //return response($MONTHNOW);
   //return ($MONTHNOW);
   return response()->json($MONTHNOW);
}

/////////////////////استعراض اليوم الحالي حسب موقع قاعدة البيانات////
public function DateNow(){
    $now = Carbon::today()->toDateString();
   return response($now);
}

/////// اجمالي عدد الحجوزات التي لم يتم تاكيد استلامها وتقييمها من المستفيد//////
     public function DeliveryConf($user_id){
        $deliveryconf=Reservation::where('res_user_id',$user_id)
        ->where('delivery_conf',0)// هذا الامر مخصص لجلب الحجوزات الي لم يتم تاكيد استلامها 
        ->where('evaluation',0)// هذا الامر مخصص لجلب الحجوزات التي لم يتم تقييم التبرع
        ->count();// orderBy('res_id','desc')
       // ->get();
        return response()->json($deliveryconf);
    }

    ////////////تعديل البيانات في جدول التبرعات واضافة رقم للتبرع الذي تم حجزة /////
     public function updateQut(Request $request,$id){
            $pro=Donation::find($id);
            $pro->update($request->all());
            return response()->json([
                'success' => true,
                'donation' => $pro
            ]);
            return response()->json([
              'success' => false,
              'message' => 'Invalid Data',
          ], 401);
          //  return $pro;

     }

/////////////////تحديث حقل تاكيد الاستلام//////
     public function updeliveryconfs(Request $request,$res_id){
        $pro=Reservation::find($res_id);
        $pro->update($request->all());
        return response()->json([
            'success' => true,
            'donation' => $pro
        ]);
        return response()->json([
          'success' => false,
          'message' => 'Invalid Data',
      ], 401);
      //  return $pro;

 }

     
//      /////////  عرض حالة المستفيد هل تم تاكيده من الوسيط ام لا//////////
// public function mediator($user_id){
//     $Benefic=Beneficiary::where('allowed_in_month','<=',1)
    
//     ->where('user_id',$user_id)

//     ->orderBy('id','desc')
    
//     ->get();
    
//       return response($Benefic);
 
// }
  /////////  عرض حالة المستفيد هل تم تاكيده من الوسيط ام لا//////////
public function getallowed_in_month($user_id){
    $allowed=Beneficiary::select('allowed_in_month')//->where('allowed_in_month','<=',1)
    ->where('user_id',$user_id)->first();
    return response()->json($allowed);
    //return ($allowed);
 }

 
    
}
