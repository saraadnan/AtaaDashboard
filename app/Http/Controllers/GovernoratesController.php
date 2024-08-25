<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GovernoratesController extends Controller
{
  public $governorate_id ,$governorate_name;
    //
        //دالة عرض كافة المحافظات
  public function getAllGovs(){  //نقوم بإنشاء كائن من نوع المودل دونر ونقوم بعمل الاستعلام//
   
    if (Auth::check()){
    $governorate = Governorate ::get();//عرض الـ View  مع البيانات الراجعة في قاعدة البيانات في المتغير category
    return view('governorate')
    -> with ('governorate', $governorate);
    }
    else 
    return view('auth.login');

  }
 
// دالة عرض واجهة الاضافة 

 public function create (){
    //لاعطاء أخر رقم في الجدول ويزيد له واحد
    if (Auth::check()){
    $governorate = DB::table('governorates');
   return view('addGovernorate')
   ->with(['governorate'=>$governorate]); 
    }
    else 
    return view('auth.login');

  }

//دالة لاضافة 
  public function store( Request $request){

    //التحقق من البيانات قبل اضافتها لقاعدة البيانات
    $validator = $request->validate([
    'gov_name'=> 'required | unique:governorates,gov_name'
    ]);
    $gov = new Governorate(); //   هذا الاوبجت هو الذي يحتوي البيانات التي سوف تنضاف لقاعدة البيانات
    // عملية الاضافة 
    
    $gov->gov_name= $request->input('gov_name');
    
    // عملية الحفظ 
    $gov->save();
    return redirect('governorates')-> with(['add_success' => __('الإضـافـة')]);

}
 

 //طريقه الحذف 
public function delete($id){

  $gov= Governorate ::find($id); //where('id'.$category_id)->dba_firstkey();
  $gov->delete();
  return redirect('governorates')-> with(['delete_success'=> __('الحـــذف ')]);
 }

 public function editgov(Request $request){
  $validator = $request->validate([
    'gov_name'=> 'required | unique:governorates,gov_name'
    ]);
    
 $update =[
  'gov_name' => $request->gov_name

 ];

 DB::table('governorates')->where('gov_id',$request->gov_id)->update($update);
 return redirect('governorates')-> with(['update_success' => __('التعديـل')]);
}



//search 
public function search(){

  $search_text = $_GET['query'];
  $governorate = Governorate::where('gov_name','LIKE','%'.$search_text.'%')
  ->get();

  return view('search.searchGov',compact('governorate'));
 }

 //كود التعديل 
//دالة عرض واجهة التعديل
//  public function showData($id) {
//     $governorate= Governorate::find($id);
//     return view('editGov',compact('governorate'));
//   }
//دالة التعديل 
    //  public function upData(Request $req){
    //  $gov= Governorate::find( $req->id);
    //  $gov->id= $req->id;
    //    $gov-> gov_name= $req->gov_name;
    //    $gov-> save();
    //    return redirect('governorates')-> with(['update_success' => __('التعديـل')]);
    //  }

    //  public function show ($id) {
    //   $gover= Governorate::find($id);
    //   return redirect('governorate',compact('gover'));
    // }


  
}
