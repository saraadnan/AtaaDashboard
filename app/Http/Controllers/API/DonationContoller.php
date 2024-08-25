<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Beneficiarie;
use App\Models\Beneficiary;
use App\Models\Categorie;
use App\Models\Category;
use App\Models\Deliveryconf;
use App\Models\Directorate;
use App\Models\Donation;
use App\Models\Person;
use App\Models\Governorate;
use App\Models\Mediator;
use App\Models\Neighborhood;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;
use App\Models\Usertype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationContoller extends Controller
{
    //////////////// اضافة تبرع جديد/Add Donation///////////////
    public function adddonation(Request $request){
        $donation=$request->donation;
        $createdd=Donation::create($request->all());{
        $request->request->add(['donation' => $donation]);
        return response()->json([
            'success' => true,
            'donation' => $donation
        ]);
        return response()->json([
          'success' => false,
          'message' => 'Invalid Data',
      ], 401);
      }
    } 
    ////////////////  حجز تبرع جديد/Add Donation///////////////
  public function resdonation(Request $request){
    $reservation=$request->reservation;
    $createdd=Reservation::create($request->all());{
    $request->request->add(['res_id' => $reservation]);
    return response()->json([
        'success' => true,
        'reservation' => $reservation
    ]);
    return response()->json([
      'success' => false,
      'message' => 'Invalid Email or Password',
  ], 401);
  }
} 
    
/////////عرض جميع التبرعات الغير محجوزة او التي لا تتساوى حقلي الكمية والحجز///
     public function getQuntall_donation(){
        $now = Carbon::now()->format('Y-m-d');
    $res=Donation::with('directorate')->with('category')->with('user')
    ->whereRaw('donation_quantity <> res_quantity')//اظهار التبرعات الغير محجوزة
    ->where('donation_exp','>',$now)///اخفاء المواد المنتهية
    ->orwhere('donation_exp','=',null)//اظهار التبرعات التي لاتحتوي على تاريخ انتهاء
    ->orderBy('donation_id','desc')->get(); 
    return response()->json($res);
     }
     //عرض التبرعات الغير محجوزة من قبل المستخدم مع اسم المحافظة
    // public function getQuntall_donation($id){
    //     $now = Carbon::now()->format('Y-m-d');
    //     $donation = Donation::with('category')->with('user')->with(['directorate' => function ($q) {
  
    //       $q->with('governorate');
    
    //       }])->whereDoesntHave('reservations' , function ($q) use ($id){
  
    //     $q->where('res_user_id',$id);
  
    //     })
    //     ->where('donation_exp','>',$now)///اخفاء المواد المنتهية
    //     ->orwhere('donation_exp','=',null)
    //     ->whereRaw('donation_quantity <> res_quantity')//اظهار التبرعات الغير محجوزة
    //     ->orderBy('donation_id','desc')
    //     ->get(); 
    //     return response()->json($donation);
  
    //   }

    
//حذف تبرع 
public function deletedona($donat_id){
    $del_don=Donation::find($donat_id); //where('id'.$category_id)->dba_firstkey();
    $del_don->delete();
     return response($del_don);
    // return redirect('donations')-> with(['delete_success'=> __('الحـــذف ')]);
   }

    //  public function preson_get(){  
    //     $Perso=Person::where('id','<>',0)->orderBy('id','desc')->get();
    //     return response()->json($Perso);
    //   //return ($Perso);
    // }
    
     //////////////////////  حسب الرقم عرض جميع تبرعات الملابس////////////////
// public function CClothess($cat_id){
//     $donations=Donation::whereRaw('donation_quantity <> res_quantity')
//     ->where('cat_id',$cat_id)->orderBy('donation_id','desc')->get();
    
//     return response($donations);


     public function CClothess($cat_id){
        $now = Carbon::now()->format('Y-m-d');
    $res=Donation::with('directorate')->with('category')->with('user')
    ->where('donation_exp','>',$now)///اخفاء المواد المنتهية
    ->where('cat_id',$cat_id)
    ->whereRaw('donation_quantity <> res_quantity')//اظهار التبرعات الغير محجوزة
    ->orwhere('donation_exp','=',null)//اظهار التبرعات التي لاتحتوي على تاريخ انتهاء
    ->orderBy('donation_id','desc')->get(); 
    return response()->json($res);
     }

     public function CFoods($cat_id){
        $now = Carbon::now()->format('Y-m-d');
    $res=Donation::with('directorate')->with('category')->with('user')
    ->where('donation_exp','>',$now)///اخفاء المواد المنتهية
    
    ->whereRaw('donation_quantity <> res_quantity')//اظهار التبرعات الغير محجوزة
    ->where('cat_id',$cat_id)
    // ->orwhere('donation_exp','=',null)//اظهار التبرعات التي لاتحتوي على تاريخ انتهاء
    ->orderBy('donation_id','desc')->get(); 
    return response()->json($res);
     }




      ///////////////////// عرض جميع التبرعات حسب كل متبرع////////////////
      public function ViewDonrs($user_id){

     $res=Donation::with('directorate')->with('category')->with('user')
     ->where('user_id',$user_id)
        ->where('donation_id','<>',0)->orderBy('donation_id','desc')
   ->get(); 
    return response($res); 
        }

         ///////////////////// عرض جميع التبرعات الغير محجوزة////////////////

        public function ViewDonrs_NOT_CHEK($user_id){ 
            $don=Donation::with('directorate')->with('category')->with('user')
            ->whereRaw('donation_quantity <> res_quantity')
            ->where('user_id',$user_id)->orderBy('donation_id','desc')->get();
            return ($don);
         }

    ////////////////////////////عرض بيانات جدول نوع المستخدم مستفيد متبرع///////////////////
    public function user_typeRole(){
        $usertypesRole=Role::where('id','<>',0)->where('id','<',3)->orderBy('id')->get();
         return response($usertypesRole);
     }

      ////////////////////////////عرض بيانات جدول تاكيد الحجز///////////////////
    public function DeliveryConfs(){
         $deliveryConfs=Deliveryconf::where('id','>',0)->orderBy('id')->get();
         return response($deliveryConfs);
     }

    /////////////////عرض جميع الاصناف///////////State State State State State State State///////////////////
    public function categories(){
        $categories=Category::where('cat_id','<>',0)->where('cat_id','<>',3)->orderBy('cat_id')->get();
 
         return response($categories);
     }

      /////////////////  عرض جميع الاصناف بما فيها الكل///////////State State State State State State State///////////////////
      public function categorie_All(){
        $categories=Category::where('cat_id','>=',0)->orderBy('cat_id')->get();
 
         return response($categories);
     }
     /////////////////GOV//////المحافظات/////State State State State State State State///////////////////
     public function governorates(){
        $governorates=Governorate::where('gov_id','<>',0)->orderBy('gov_id')->get();
         return response($governorates);
     }
     ////////////////MUD///////المديريات/////Citie Citie Citie directorates Citie Citie Citie///////////////////
     public function directorates($id){
        $directorates=Directorate::where('dir_id','<>',0)->where('gov_id',$id)->orderBy('dir_id')->get();
        return response()->json($directorates);//([
}
    ////////////////Dir//////الاحياء او المناطق//////directorates///////////////////
public function neighborhoods($dir_id, $gov_id){
    $neighborhoods=Neighborhood::where('neigh_id','<>',0)->where('dir_id',$dir_id)->where('gov_id',$gov_id)->orderBy('neigh_id')->get();
    return response()->json($neighborhoods);//([
}

// public function indexxxxxxx(){
//     $cats=Beneficiarie::select('id','user_id')->get();
//     return view('indexxxxxxx')
//     ->with('allowed_in_month',$cats)
//     ;
// }

public function userBen($id)
{
    $user=User::with('beneficiarie')->find($id);
    ///////////عرض الاسم ورقم المستخدم تحديد////
    // echo $user->username."<br>";
    // echo $user->id."<br>";
    
     return response()->json($user);
}

/////////  عرض الكمية التي قد تم حجزها//////////
public function res_Qunt($donation_id){
    $allowed=Donation::select('res_quantity')//->where('allowed_in_month','<=',1)
    ->where('donation_id',$donation_id)->first();
    return response()->json($allowed);
    //return ($allowed);
 }
// ////// //////////عرض بيانات من جدول التبرعات وجدول حجز التبرعات//////
// public function dona_res(){
//     $reservation=Reservation::where('res_id','<>',0)->orderBy('res_id','desc')->get();
//     return response()->json($reservation);

//     }
    
    
    
    
    //     //////////////////حجز تبرع جديد////////////////
//     public function resdonation($id){
//         $resdona=Donation::where('donation_id','<>',0)->where('donation_id',$id)->orderBy('donation_id','desc')->get();
//         return response()->json($resdona);//([
// }

// //////////////////////عرض جميع تبرعات الملابس////////////////
// public function Clothess(){
//     $cat_id=Donation::where('cat_id','=',1)->orderBy('donation_id','desc')->get();
//     return response($cat_id);
// }


// //////////////////////عرض جميع تبرعات الملابس////////////////
// public function Foods(){
//     $cat_id=Donation::where('cat_id','=',2)->orderBy('donation_id','desc')->get();
//     return response($cat_id);
// }


//////////////////////عرض جميع تبرعات الاخرى ////////////////
// public function More(){
//     $cat_id=Donation::where('cat_id','=',3)->orderBy('donation_id','desc')->get();
//     return response($cat_id);
// }
// ////// //////////عرض بيانات من جدول التبرعات وجدول حجز التبرعات//////
// public function dona_resdona_resdona_res(){
//     $donationnn = Reservation::find(48);//->where('donation_id', '<>',0);
//     return ($donationnn);//-> reservation_asl;

//     }
    
       
// public function index_prestataire()
// {
//     $states = Governorate::select("states.*")->get()->toArray();
    
//     return response()->json($states);
// }
// /**
//  * Display the specified resource.
//  *
//  * @param  \App\Models\Prestataires  $prestataire
//  * @return \Illuminate\Http\Response
//  */
// // public function show_prestataire($state_id)
// // {
// //     $states = Directorate::findOrFail($state_id);

//     if (!$states) {
//         return response()->json([
//             'success' => false,
//             'message' => 'Sorry, categorie prestation not found.'
//         ], 400);
//     }
//     return $states;
// }

       ////////////////////////////عرض بيانات جدول المستخدمين///////////////////
    // public function indexxx(){
    //     $users=User::where('id','<>',0)->orderBy('id','desc')->get();
    //     return response($users);
    // }

    // public function updateDon(Request $request, $id)
    //  {
    //      $product = auth()->user()->Beneficiar()->find($id);
  
    //      if (!$product) {
    //          return response()->json('sorry', 400);
    //      }
  
    //      $updated = $product->fill($request->all())->save();
  
    //      if ($updated)
    //          return response()->json('done'
    //          //     [
    //          //     'success' => true
    //          // ]
    //      );
    //      else
    //          return response()->json('sorry'
    //          //     [
    //          //     'success' => false,
    //          //     'message' => 'Product could not be updated'
    //          // ]
    //          , 500);
    //  }
}
