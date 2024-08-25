<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Degree_of_need;
use App\Models\Mediator;
use App\Models\Reservation;
use Illuminate\Http\Request;


class MediatorsContoller extends Controller
{
   
     ///////////استدعاء قائمة حالة الحرج
     public function degreeofneed(){
        $degree_id=Degree_of_need::where('degree_id','<>',1)->orderBy('degree_id')->get();
         return response($degree_id);
     }

    //   ///////استدعاء حالة حسب الرقم المحدد من قبل الوسيط
    //   public function degree_of_Need($degree_id){
    //     $degree_id=Degree_of_need::where('degree_id',$degree_id)
    //     ->get();
    //      return ($degree_id);
    //  }

////////////////استعراض المستفيد الغير مؤكدين للاحقيه
     public function getBen($neigh_id){
        $ben=Beneficiary::with('user')->with('neighborhood')->where('neigh_id',$neigh_id)
        ->where('allowed_in_month','=',1)
        ->get();
        // $med =Mediator::with('user')->where('user_id',$id)->first();
        // $ben= $med->beneficiaries->where('allowed_in_month',1);
        return response($ben);
    }

    ////////////////استعراض المستفيد المؤكدين لهم الاحقية
    public function getBen_Conf($id){
        $ben=Beneficiary::with('user')->with('neighborhood')->with('degre_asl')->where('user_id_med',$id)
        ->where('allowed_in_month','<>',1)
        ->get();
        // $med =Mediator::with('user')->where('user_id',$id)->first();
        // $ben= $med->beneficiaries->where('allowed_in_month',1);
        return response($ben);
    }

    /////////////////تحديث حقل تاكيد الاحقيه//////
    public function confBendgre(Request $request,$res_id){
        $conf_deg=Beneficiary::find($res_id);
        $conf_deg->update($request->all());
        return response()->json([
            'success' => true,
            'donation' => $conf_deg
        ]);
        return response()->json([
          'success' => false,
          'message' => 'Invalid Data',
      ], 401);
      //  return $pro;

 }


 //////استدعاء الحي الذي به الوسيط لتسجيل رقم الوسيط عند ادخال بيانات المستفيد
////بحسب الحي
public function nig_med_reg_ben($neigh_id){
    $ben=Mediator::with('user')
     ->with('neighborhood')
    //  ->where('neigh_id','user_id')
    ->where('neigh_id',$neigh_id)
    ->where('neigh_id','<>',9)
    ->orderBy('med_id','desc')
    ->first();
    // $med =Mediator::with('user')->where('user_id',$id)->first();
    // $ben= $med->beneficiaries->where('allowed_in_month',1);
    return response($ben);
}


 //////استدعاء الحي الذي به الوسيط لتسجيل رقم الوسيط عند ادخال بيانات المستفيد
////بحسب الحي
public function med_user_id($user_id){
    $ben=Mediator::select('neigh_id')->where('user_id',$user_id)
    ->where('neigh_id','<>',9)
    ->orderBy('med_id','desc')
    ->first();
    // $med =Mediator::with('user')->where('user_id',$id)->first();
    // $ben= $med->beneficiaries->where('allowed_in_month',1);
    return response($ben);
}

}
