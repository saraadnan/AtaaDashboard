<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Mediator;
use App\Models\Neighborhood;

class MediatorController extends Controller
{
    // عرض كافة المستفيدين التابعين للوسيط المسجل
       public function allBen($id){
        
        $ben = Beneficiary::with('user')->where('user_id_med',$id)->get();
        return response()->json($ben);

      //   $ben = $med->beneficiaries->where('allowed_in_month','1');
      //   return response()->json($med);
     

       }

    // عرض  المستفيدين التابعين للوسيط الذين لم يتم تأكيد احقيتهم
       public function confBen($id){
         $med = Mediator::with('user')->with('Neighborhood')->where('user_id',$id)->first();
          $ben = $med->beneficiaries->where('allowed_in_month','1');

                   //  $ben = Beneficiary::where('neigh_id',$med->neighborhood)->where('allowed_in_month','1');

      //   $ben = Beneficiary::with('user')->where('user_id_med',$id)->where('allowed_in_month','1')->get();
        return response()->json($ben);
      //   $ben = $med->beneficiaries->where('allowed_in_month','1');



       }


       //تأكيد الأحقية
       public function getBen(){

         $id= auth()->user()->id;
         $med = Mediator::with('user')->where('user_id',$id)->first();
          $ben = $med->beneficiaries->where('allowed_in_month','1');
 
        $id= auth()->user()->id;
        $med = Mediator::with('user')->where('user_id',$id)->first();
        $neigh= Neighborhood::where('neigh_id',$med->neigh_id)->get();
       // return response()->json($ben);
        return view('confBen',compact('ben','neigh'));
 
        }
 
 // عرض كافة المستفيدين التابعين للوسيط المسجل
        public function allBene(){
          
         $id= auth()->user()->id;
         $med = Mediator::with('user')->where('user_id',$id)->first();
         $ben = $med->beneficiaries->where('allowed_in_month','<>','1');
       // return response()->json($ben);
        return view('showBenMed',compact('ben'));
 
        }
 
}