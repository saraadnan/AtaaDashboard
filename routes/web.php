<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client;
use App\Http\Controllers;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Controller\UserController;
use App\Http\Controllers\DonorsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MediatorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController\Controller;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DirectorateController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GovernoratesController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use App\Http\Controllers\NeighborhoodController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController as ControllersUserController;
use App\Models\Governorate;
use App\Models\Mediator;
use Illuminate\Support\Facades\Auth;



//Route خاص بتطبيق
use App\Http\Controllers\API\ReservationsController;
use App\http\Controllers\CategoriesController;
use App\Http\Controllers\Demo\DemoController;
use App\http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\SecondController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/index', [IndexController::class, 'index']);
Route::get('/error', [IndexController::class, 'error']);


// Route::get('/register', [RegisterController::class, 'register']) -> name('register');

// Route::namespace('Auth')->group(function() {

//     Route::get('login', [LoginController::class,'login']);
// });
// Route::controller('Controller')->group(function() {

// Route::get('/user', [UserController::class, 'show']);
// });
// Route::controller('Test')->group(function() {
// Route:: get ('/test', [TestController::class , 'showname']);
// });

// Route::resource('new', ResourceController::class );

//  Route::get('/login',[LoginC::class,'login']) -> name('login');
// Route::get('/mediator', [MediatorController::class, 'index']);
//Auth::routes();


// --------------------routes for login---------------------------------------------- 
Auth::routes();
Route::get('logout',[LoginController::class,'logout']);

// --------------------End routes of login ----------------------------------------------

// --------------------routes for home page---------------------------------------------- 
Route::get('/index', [IndexController::class, 'index']);
// --------------------End routes of home page ----------------------------------------------



// --------------------routes for donors---------------------------------------------- 
Route::get('/donors',[DonorsController::class,'getAllDonors']) -> name('donors');
Route::get('/viewAddDonor',[DonorsController::class,'create']) -> name('viewAddDonor');
Route::post('/insertDonor',[DonorsController::class,'store']) -> name('addDonor');
Route::get('deleteDonor/{id}',[DonorsController::class,'delete']);
Route::post('/editdonor', [DonorsController::class,'editdonor'])-> name('editdonor');
Route::get('/searchDonor',[DonorsController::class ,'search']);

// --------------------End routes of donors ----------------------------------------------






//-----------------------routes for category------------------------------------------
Route::get('/viewAddCategory',[CategoryController::class,'create']) -> name('viewAddCategory');
Route::post('/insertCategory',[CategoryController::class,'store']) -> name('addCategory');
Route::get('/categories',[CategoryController::class,'getAllCategory']) -> name('categories');
Route::get('deleteCategory/{id}',[CategoryController::class,'delete']);
Route::post('/editcat', [CategoryController::class,'editcat'])-> name('editcat');
Route::get('/searchCat',[CategoryController::class ,'search']);


// --------------------------End Categories ---------------------------------------------



//--------------------------routes for governorate المحافظات-----------------------
Route::get('/governorates',[GovernoratesController::class,'getAllGovs'])/*->middleware('auth')*/ -> name('governorates');

Route::get('/viewAddGov',[GovernoratesController::class,'create']) -> name('viewAddGov');
Route::post('/insertgov',[GovernoratesController::class,'store']) -> name('addCategory');

Route::get('deleteGov/{id}',[GovernoratesController::class,'delete']);
Route::post('/editgov', [GovernoratesController::class,'editgov'])-> name('editgov');
Route::get('/searchGov',[GovernoratesController::class ,'search']);

// Route::get('editGover/{id}',[GovernoratesController::class,'showData']);
//Route::post('editGov/',[GovernoratesController::class,'upData']);

//-----------------------End governorate routes---------------------------------------






//--------------------routes for dirctorate المديريات -----------------------------------------
Route::get('/directorates',[DirectorateController::class,'getAllDirs']) -> name('directorates');
Route::get('/viewAddDir',[DirectorateController::class,'create']) -> name('viewAddDir');
Route::post('/insertdir',[DirectorateController::class,'store']) -> name('addDir');
Route::get('deleteDir/{id}',[DirectorateController::class,'delete']);
//Route::get('editGover/{id}',[DirectorateController::class,'showData']);
Route::post('editdir/',[DirectorateController::class,'editdir'])-> name('editdir');
Route::get('/searchDir',[DirectorateController::class ,'search']);
Route::get('fetch-dir',[DirectorateController::class ,'fetchDir'])->name('fetch-dir');


//----------------------------End directorate's route--------------------------------------





//--------------------routes for neighborhood الأحياء -----------------------------------------
Route::get('/neighborhoods',[NeighborhoodController::class,'getAllNeigh']) -> name('neighborhoods');
Route::get('/viewAddNeigh',[NeighborhoodController::class,'create']) -> name('viewAddNeigh');
Route::post('/insertneigh',[NeighborhoodController::class,'store']) -> name('addNeigh');
Route::get('deleteNeigh/{id}',[NeighborhoodController::class,'delete']);
//Route::get('editGover/{id}',[NeighborhoodController::class,'showData']);
Route::post('editneigh/',[NeighborhoodController::class,'editneigh'])-> name('editneigh');
Route::get('/searchNeigh',[NeighborhoodController::class ,'search']);


//----------------------------End neighborhood's route--------------------------------------




//--------------------routes for beneficiary المستفيدين -----------------------------------------
Route::get('/beneficiary',[BeneficiaryController::class,'getAllBen']) -> name('beneficiary');
Route::get('/viewAddBen',[BeneficiaryController::class,'create']) -> name('viewAddBen');
Route::post('/insertben',[BeneficiaryController::class,'store']) -> name('addBen');
Route::get('deleteBen/{id}',[BeneficiaryController::class,'delete']);
//Route::get('editGover/{id}',[NeighborhoodController::class,'showData']);
Route::post('editben/',[BeneficiaryController::class,'editben'])-> name('editben');
Route::get('/searchBen',[BeneficiaryController::class ,'search']);

//----------------------------End beneficiary's route--------------------------------------
// Route::get('/user',[BeneficiaryController::class,'user']) ;


//--------------------routes for mediators الوسطاء -----------------------------------------
Route::get('/mediator',[MediatorController::class,'getAllMed']) -> name('mediator');
Route::get('/viewAddMed',[MediatorController::class,'create']) -> name('viewAddMed');
Route::post('/insertmed',[MediatorController::class,'store']) -> name('addNeigh');
Route::get('deleteMed/{med_id}',[MediatorController::class,'delete']);
//Route::get('editGover/{id}',[NeighborhoodController::class,'showData']);
Route::post('editmed/',[MediatorController::class,'editmed'])-> name('editmed');
Route::get('/searchMed',[MediatorController::class ,'search']);


//تأكيد الأحقية
Route::get('/confben',[MediatorController::class,'getBen']) -> name('confben');
Route::get('/indexMed',[IndexController::class,'indexMed']) -> name('indexMed');
Route::get('/allBen',[MediatorController::class,'allBen']) -> name('allBen');
Route::get('/benaddview',[MediatorController::class,'addBenView']) -> name('benaddview');
Route::post('/addben',[MediatorController::class,'addben']) -> name('addben');
Route::post('editbenmed/',[MediatorController::class,'editbenmed'])-> name('editbenmed');


//----------------------------End mediator's route--------------------------------------



//--------------------routes for donations التبرعات -----------------------------------------
Route::get('/donation',[DonationController::class,'getAllDon']) -> name('donation');
Route::get('/viewAddDon',[DonationController::class,'create']) -> name('viewAddDon');
Route::post('/insertdon',[DonationController::class,'store']) -> name('addDonation');
Route::get('deletedon/{id}',[DonationController::class,'delete']);
//Route::get('editGover/{id}',[NeighborhoodController::class,'showData']);
Route::post('editdon/',[DonationController::class,'editdon'])-> name('editdon');
Route::get('/searchDon',[DonationController::class ,'search']);
Route::get('/getAllRes',[DonationController::class ,'getAllRes']);
Route::get('/getAllNotRes',[DonationController::class ,'getAllNotRes']);
Route::get('deleteNotRes/{id}',[DonationController::class,'deleteNotRes']);


Route::get('/alldonation/{id}' , [DonationController::class , 'bendonation']);
Route::get('/dg' , [DonationController::class , 'getgov']);



//----------------------------End donation's route--------------------------------------

//--------------------routes for users المستخدمين -----------------------------------------
Route::get('/user',[ControllersUserController::class,'getuser']) -> name('user');
Route::get('/viewAddUser',[ControllersUserController::class,'create']) -> name('viewAddUser');
Route::post('/insertuser',[ControllersUserController::class,'store']) -> name('addNeigh');
Route::get('deleteUser/{id}',[ControllersUserController::class,'delete']);
// //Route::get('editGover/{id}',[NeighborhoodController::class,'showData']);
Route::post('edituser/',[ControllersUserController::class,'edituser'])-> name('editmed');
// Route::get('/searchMed',[ControllersUserController::class ,'search']);
//----------------------------End user's route--------------------------------------





//--------------------routes for roles الصلاحيات -----------------------------------------

Route::get('/roles',[RoleController::class,'createRoles']);




Route::get('/sub',[RoleController::class,'getQuantity']);


//----------------------------End role's route--------------------------------------
Route::get('/donation',[DonationController::class,'getAllDon']);
Route::get('deleteDon/{id}',[DonationController::class,'delete']);
Route::post('editdonation/',[DonationController::class,'editdonation'])-> name('editdonation');


//-------------Test----------------------------------------


Route::get('/donation_waiting/{id}',[SecondController::class ,'donation_waiting']);















//----------------------------End role's ataa--------------------------------------
Route::get('/roles/{user_id}',[DemoController::class,'roles']);
Route::get('/add_res/{d_id}/{b_id}',[ReservationsController::class,'index']);
Route::get('/user_res/{id}',[ReservationsController::class,'userRes']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/add_category',[CategoriesController::class,'store']);
Route::get('/show_categories',[CategoriesController::class,'index']);

Route::get('/home',[HomeController::class,'index'])->name('homepage');

Route::get('/add_job',[JobsController::class,'create']);
Route::post('/save_job',[JobsController::class,'store']);
Route::get('/update_job/{id}',[JobsController::class,'update']);
//----------------------------End role's ataa--------------------------------------