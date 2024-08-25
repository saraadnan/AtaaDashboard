<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\Mediator;
use App\Models\Reservation;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index(){
        if (Auth::check()){
        $ben = Beneficiary::count();
        $donor= Donor::count();
        $med= Mediator::count();
        $donation= Donation::count();
        $rev = Reservation::count();
        $notRev = Donation::where('res_quantity','0')->count();
        return view('index' ,compact('ben' ,'donor','med','donation','rev','notRev'));
        }
        else 
        return view('auth.login');
    
    }

    public function indexMed(){

    //     $id= auth()->user()->id;
    //     $med = Mediator::with('user')->where('user_id',$id)->first();
    //     $ben = $med->beneficiaries->where('allowed_in_month','<>','1');
    //   // return response()->json($ben);
    //    return view('showBenMed',compact('ben'));

        if(Auth::check()){
            $id= auth()->user()->id;
            $med = Mediator::with('beneficiaries')->where('user_id',$id)->first();
            $ben = $med->beneficiaries->where('allowed_in_month','<>','1')->count();

            $mediator = Mediator::with('user')->where('user_id',$id)->first();
            $bencount = $mediator->beneficiaries->where('allowed_in_month','1')->count();
              return view('indexMed' ,compact('ben' ,'bencount'));
            // return response()->json( $ben);
        }
        else 
        return view('auth.login');
        
    }


    public function error(){
      
        return view('error');
    }
}
