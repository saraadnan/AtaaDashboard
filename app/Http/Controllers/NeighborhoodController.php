<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use App\Models\Governorate;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class NeighborhoodController extends Controller
{
    // العرض
    public function getAllNeigh(){  //نقوم بإنشاء كائن من نوع المودل دونر ونقوم بعمل الاستعلام//
      if (Auth::check()){
      $neighborhood = Neighborhood::with('directorate')->get(); 
        $directorate = Directorate::get();
        $governorate = Governorate::get();

        return view('neighborhood' ,compact('neighborhood','directorate','governorate'));
      }
      else 
      return view('auth.login');
  
      }

      public function create (){
        if (Auth::check()){
          $gov = Governorate::get();
        $directorate = Directorate::get();
        return view('addNeighborhood',compact('directorate','gov')); 
        }
        else 
        return view('auth.login');
  

    }
    public function store( Request $request){

        //التحقق من البيانات قبل اضافتها لقاعدة البيانات
        $validator = $request->validate([
        'neigh_name'=> 'required |unique:neighborhoods,neigh_name',
        'dir_id'=>'required'
        ]);
        $neighborhood = new Neighborhood(); //   هذا الاوبجت هو الذي يحتوي البيانات التي سوف تنضاف لقاعدة البيانات
       
       
        // عملية الاضافة 
        $neighborhood->neigh_name= $request->input('neigh_name');
        $neighborhood->dir_id = $request->input('dir_id');
        
        // عملية الحفظ 
        $neighborhood->save();

        //العودة الى واجهة عرض المتبرعين
        return redirect('neighborhoods')-> with(['add_success' => __('الإضـافـة')]);
    }
    // طريقه الحذف 
     public function delete($id){

      $neighborhood= Neighborhood ::find($id); //where('id'.$category_id)->dba_firstkey();
      $neighborhood->delete();
      return redirect('neighborhoods')-> with(['delete_success'=> __('الحـــذف ')]);
     }
  
       //كود التعديل
       public function editneigh(Request $request){
        // $validator = $request->validate([
        //  'donor_name'=> 'required' 
        //  ]);
         
      $update =[
       'neigh_name' => $request->input('neigh_name'),
       'dir_id' => $request->input('dir_id')
      ];
     
      DB::table('neighborhoods')->where('neigh_id',$request->neigh_id)->update($update);
      return redirect('neighborhoods')-> with(['update_success' => __('التعديـل')]);
     }
   

     //search
     public function search(){
      $search_text = $_GET['query'];
      $neighborhood = Neighborhood::where('neigh_name','LIKE','%'.$search_text.'%')
      ->with('directorate')
      ->get(); 

      $directorate = Directorate::get();
      return view('search.searchNeigh',compact('directorate','neighborhood'));
     }




   
}
