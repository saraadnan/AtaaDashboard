<?php

use App\Http\Controllers\API\DonationContoller;
use App\Http\Controllers\API\ReservationsController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API;
use App\Http\Controllers\API\MediatorsContoller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

///=========================================الوسيط
///////////استدعاء قائمة حالة الحرج
Route::get('/degree_ofneed',[MediatorsContoller::class,'degreeofneed']);
///////////استدعاء حالة حسب الرقم المحدد من قبل الوسيط
// Route::get('/degree_of_Need/{degree_id}',[MediatorsContoller::class,'degree_of_Need']);


///////////////استعراض المستفيد الغير مؤكدين للاحقيه
Route::get('/confben/{id}',[MediatorsContoller::class,'getBen']);

///////////////استعراض المستفيد المؤكدين لهم الاحقية
Route::get('/get_Ben_Conf/{id}',[MediatorsContoller::class,'getBen_Conf']);

///////////تاكيد وتحديث حقل احقية المستفيد
Route::post('/confBen_dgre/{id}',[MediatorsContoller::class,'confBendgre']);

///////////استدعاء بيانات الحي للوسيط عند تسجيل باقي بيانات المستفيد
Route::get('/nig_med_regben/{neigh_id}',[MediatorsContoller::class,'nig_med_reg_ben']);


//////////استدعاء بيانات الحي حسب رقم الوسيط
Route::get('/med_userid/{user_id}',[MediatorsContoller::class,'med_user_id']);

///=====================================

/////////// عرض الحجوزات حسب المستخدم التي لم يتم تاكيد استلامها  ///////////
Route::get('/user_res/{id}',[ReservationsController::class,'UserRes']);

/////////////تبرعات في انتظار تسليمها من المتبرع للمستفيد
Route::get('/Witing_donrres/{id}',[ReservationsController::class,'Witing_donr_res']);

// Route::get('/getAllNotResA',[ReservationsController::class ,'getAllNotResA']);

/////////////عرض جميع الحجوزات حسب المستخدم//
Route::get('/myres/{id}',[ReservationsController::class,'my_res']);


///////////عرض بيانات المستفيد مع بيانات الوسيط حسب منطقته//
Route::get('/My_Data/{userid}',[UsersController::class,'MyData']);



/////////////////////////////عرض التبرعات حسب كل متبرع//
Route::get('/View_Donrs/{donrsid}',[DonationContoller::class,'ViewDonrs']);

/////////////////////////////عرض التبرعات الغير محجوزة لكل متبرع//
Route::get('/ViewDonrsNOT_CHEK/{donrsid}',[DonationContoller::class,'ViewDonrs_NOT_CHEK']);


// /////////////////////////////جلب اعلى قيمة في جدول ال المستخدمين+1//
// Route::get('/MaxUserIdget',[UsersController::class,'MaxUserId_get']);



//////عرض اجمالي عدد الحجوزات التي تمت لكل مستفيد حسب الشهر الحالي ///////
Route::get('/Cundon_Res/{id}/{monthid}',[ReservationsController::class,'CundonRes']);



//////عرض الشهر الحالي حسب الشهر التي تقع فيه قاعدة البيانات ///////
Route::get('/month_Now',[ReservationsController::class,'MonthNow']);

//////عرض اليوم الحالي حسب موقع القاعدة البيانات ///////
Route::get('/Date_Now',[ReservationsController::class,'DateNow']);


//////عرض عدد التبرعات المسموح حجزها حسب الحالة الحرجة المحددة لكل مستفيد ///////
Route::get('/allowed_in_Month/{userid}',[ReservationsController::class,'allowedINmonth']);

//////عرض التبرعات التي لم يتم تاكيد استلامها ولم يتم تقييم التبرع ///////
Route::get('/Delivery_Conf_evaluation/{userid}',[ReservationsController::class,'DeliveryConf']);

// /////عرض تاكيد الوسيط للمستفيد وتحديد مدى الحالة الحرجة لكل مستفيد//////
// Route::get('/media_tors/{userid}',[ReservationsController::class,'mediator']);


// //////////////////////////عرض جميع التبرعات//////////////////////
// Route::get('/all_donation',[DonationContoller::class,'index']);

//////////////////////////عرض جميع التبرعات الغير محجوزة واخفاء المحجوز//////////////////////
Route::get('/all_donation',[DonationContoller::class,'getQuntall_donation']);

Route::get('/preson_get_all',[DonationContoller::class,'preson_get']);

/////عرض تاكيد الوسيط للمستفيد وتحديد مدى الحالة الحرجة لكل مستفيد//////
Route::get('/getallowed_in_month/{userid}',[ReservationsController::class,'getallowed_in_month']);


/////التحقق من ادخال باقي بيانات المستفيد//////
Route::get('/check_Ben_Reg/{userid}',[ReservationsController::class,'CheckBenReg']);


/////التحقق من نوع المستخدم الحساب مفعل ام غير مفعل//////
Route::get('/check_user_type/{userid}/{usertypeid}',[UsersController::class,'Checkusertype']);


/////عرض الكمية المحجوزة من جدول التبرعات//////
Route::get('/resQunt/{donation_id}',[DonationContoller::class,'res_Qunt']);

///////////ربط جدول المستخدمين مع جدول المستفيدين برقم المستخدم///
Route::get('/all_userBen/{id}',[DonationContoller::class,'userBen']);

/////////////عرض جميع تبرعات الاصناع حسب رقم الصنف/////////////////
Route::get('/all_Clothes/{cat_id}',[DonationContoller::class,'CClothess']);

Route::get('/all_Food/{cat_id}',[DonationContoller::class,'CFoods']);


//////////////////////////التعديلات//////////////////////
// Route::put('/Ben_editben/{user_id}',[ReservationsController::class,'editben']);
Route::post('/update_Qut/{id}',[ReservationsController::class,'updateQut']);
Route::get('/delete_dona/{id}',[DonationContoller::class,'deletedona']);

Route::get('/govv_vvv',[ReservationsController::class,'govvvvv']);
Route::get('/jooo_ooo',[ReservationsController::class,'joooooo']);

//////////////////////////تعديل حقل تاكيد الاستلام///////////
Route::post('/up_delivery_confs/{res_id}',[ReservationsController::class,'updeliveryconfs']);


////////////اضافة تبرع جديد/////////////////
Route::post('/add_donation',[DonationContoller::class,'adddonation']);

////////////حجز تبرع /////////////////
Route::post('/res_donation',[DonationContoller::class,'resdonation']);

///////////////////عرض جميع انواع المستخدمين مستفيد متبرع وسيط//////////////////
Route::get('/user_type_roles',[DonationContoller::class,'user_typeRole']);


///////////////////عرض تاكيد الحجوزات//////////////////
Route::get('/Delivery_Confs',[DonationContoller::class,'DeliveryConfs']);

//////////////////////////////////  عرض جميع المحافظات/ مديريات احياء/////////////////
Route::get('/governorates',[DonationContoller::class,'governorates']);
Route::get('/directorates/{id}',[DonationContoller::class,'directorates']);
Route::get('/neigh_borhoods/{dir_id}/{gov_id}',[DonationContoller::class,'neighborhoods']);

////////////عرض الاصناف ملابس مواد غذائية/
Route::get('/categorie_shwo',[DonationContoller::class,'categories']);

// ///الله يعين لما يرتبط/////عرض بيانات من جدول التبرعات وجدول حجز التبرعات////// 
// Route::get('/dona_res_shwo',[DonationContoller::class,'dona_res']);

//////////////////بايعين الله/////ربط جدول المستخدمين مع جدول بيانات المستفيدين//////
Route::get('/user_Ben/{id}',[UsersController::class,'userBen']) ;

/////////////////////////تسجيل الدخول////////////////////
Route::post('/login_user',[UsersController::class,'login']);

////////////تسجيل مستخدم جديد/////////////////
Route::post('/add_register',[UsersController::class,'register']);

////////////تسجيل باقي بياناتي المستخدم الجديد لمستفيد/////////////////
Route::post('/beneficiarie',[UsersController::class,'beneficiaries']);

Route::get('/e_logout',[UsersController::class,'logout']);

// /////////////عرض جميع تبرعات المواد الغذائية   /////////////////
// Route::get('/all_more',[DonationContoller::class,'More']);

// /////////////عرض جميع تبرعات الملابس   /////////////////
// Route::get('/all_Clothess',[DonationContoller::class,'Clothess']);

// /////////////عرض جميع تبرعات المواد الغذائية   /////////////////
// Route::get('/all_food',[DonationContoller::class,'Foods']);

//Route::get('/user_Ben',[DonationContoller::class,'userBen']) ;
//Route::post('/user_type_citiex/{id}',[DonationContoller::class,'citiex']);
//Route::post('/user_type_u',[DonationContoller::class,'indexxx']);
//Route::post('/check_user',[UsersController::class,'loginn']);
// Route::post('nos-prestataires', [DonationContoller::class, 'index_prestataire'])->name('nos-prestataires');
// Route::post('nos-prestataires/{state_id}', [DonationContoller::class, 'show_prestataire']);

//Route::post('/e_update',[UsersController::class,'getCurrentUser']);

