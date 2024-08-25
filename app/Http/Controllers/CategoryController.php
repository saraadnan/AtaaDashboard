<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
 
    //دالة عرض كافة الاصناف
  public function getAllCategory(){
      //نقوم بإنشاء كائن من نوع المودل دونر ونقوم بعمل الاستعلام//
      if (Auth::check()){
  // تم تعديلها

      $category = Category ::where('cat_id' ,'<>' ,'0')->get();//عرض الـ View  مع البيانات الراجعة في قاعدة البيانات في المتغير category
    return view('category')
    -> with ('category', $category);
      }
      else
      return view('auth.login');

  }
 
// دالة عرض واجهة الاضافة 

 public function create (){
  if (Auth::check()){

  // $category = DB::table('categories')->max('id')+1;
   return view('addCategory');
  
  //  ->with(['category'=>$category]); 
  }
  else
  return view('auth.login');

   
  }

//دالة لاضافة 
  public function store( Request $request){

    //التحقق من البيانات قبل اضافتها لقاعدة البيانات
    $validator = $request->validate([
    'cat_name'=> 'required | unique:categories,cat_name'
    ]);
      // تم تعديلها

    $category = new Category(); //   هذا الاوبجت هو الذي يحتوي البيانات التي سوف تنضاف لقاعدة البيانات
    // عملية الاضافة 
    
    $category->cat_name= $request->input('cat_name');
    
    // عملية الحفظ 
    $category->save();
    return redirect('categories')-> with(['add_success' => __('الإضـافـة')]);

}
 

 //طريقه الحذف 64
public function delete($id){
  // تم تعديلها
  $category=Category::find($id); //Category::where('id'.$category_id)->dba_firstkey();
  $category->delete();
  return redirect('categories')-> with(['delete_success'=> __('الحـــذف ')]);
 }

//كود التعديل
 public function editcat(Request $request){
  $validator = $request->validate([
    'cat_name'=> 'required | unique:categories,cat_name'
    ]);
    
 $update =[
  'cat_name' => $request->cat_name

 ];

 DB::table('categories')->where('cat_id',$request->cat_id)->update($update);
 return redirect('categories')-> with(['update_success' => __('التعديـل')]);
}


//search 
public function search(){

  $search_text = $_GET['query'];
    // تم تعديلها

  $category = Category::where('cat_name','LIKE','%'.$search_text.'%')
  ->get();

  return view('search.searchCat',compact('category'));
 }
 }