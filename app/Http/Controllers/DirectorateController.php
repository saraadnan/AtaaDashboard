<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DirectorateController extends Controller
{
    //
    public function getAllDirs(){  //نقوم بإنشاء كائن من نوع المودل دونر ونقوم بعمل الاستعلام//
      // //                        اسم الدالة الموجودة في المودل directorate
      if (Auth::check()){
        $directorate = Directorate:: with('governorate')->get(); 
        $governorate = Governorate::get();

        return view('directorate' ,compact('directorate','governorate'));
      }
      else
      return view('auth.login');
    

      }

      public function create (){
        if (Auth::check()){
      $governorate = Governorate::get();
       return view('addDirectorate')
       ->with(['governorate'=>$governorate]);
        
        }
        else
        return view('auth.login');
  
      }
    
    //دالة لاضافة 
      public function store( Request $request){
    
        //التحقق من البيانات قبل اضافتها لقاعدة البيانات
        // $validator = $request->validate([
        // 'dir_name'=> 'required | unique:governorates,gov_name',
        // 'gov_id'=> 'required'
        // ]);
        $directorate = new Directorate(); //   هذا الاوبجت هو الذي يحتوي البيانات التي سوف تنضاف لقاعدة البيانات
        // عملية الاضافة 
        
        $directorate->dir_name= $request->input('dir_name');
        $directorate->gov_id =$request->input('gov_id');
        
        // عملية الحفظ 
        $directorate->save();
        return redirect('directorates')-> with(['add_success' => __('الإضـافـة')]);
    
    }
    
     //طريقه الحذف 
     public function delete($id){

      $directorate= Directorate ::find($id); //where('id'.$category_id)->dba_firstkey();
      $directorate->delete();
      return redirect('directorates')-> with(['delete_success'=> __('الحـــذف ')]);
     }
  
      //كود التعديل
      public function editdir(Request $request){
        // $validator = $request->validate([
        //  'donor_name'=> 'required' 
        //  ]);
         
      $update =[
       'dir_name' => $request->input('dir_name'),
       'gov_id' => $request->input('gov_id')
      ];
     
      DB::table('directorates')->where('dir_id',$request->dir_id)->update($update);
      return redirect('directorates')-> with(['update_success' => __('التعديـل')]);
     }

     //search 
     public function search(){
      $search_text = $_GET['query'];
      $directorate = Directorate::where('dir_name','LIKE','%'.$search_text.'%')
      ->with('governorate')
      ->get(); 

      $governorate = Governorate::get();
      return view('search.searchGov',compact('directorate','governorate'));
     }
    
     public function fetchDir(Request $request)
     {
         $dir = Directorate::where("gov_id",$request->gov_id)
         ->get();
         return response()->json($dir);
     }
}
