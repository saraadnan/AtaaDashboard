<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecondController extends Controller
{
    public function addtwodays()
    {
    //   $donation = Donation::get();

    //   $date = DB::table('donations')
    //     ->selectRaw("created_at")
    //     ->get();
        // $date = date('Y-m-d H:i:s');
        // $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)
        // ->format('Y-m-d');
        // // $query = Donation::selectRaw(["created_at",'DATE_FORMAT(created_at,"%Y-%m-%d %H:%i:00")']);

        // return  $newDate;


        // $results = DB::table('donations')
        //     ->select("created_at as date")
        //     ->first();
        //     echo $results->format('d-m-Y');

        $created_at = DB::table('donations')
        
            ->select("created_at as date ,DATEFORMAT('Y-m-d',date)")
        
            ->get();

// $date = Carbon::parse($created_at->date);

// echo $date->format("Y-m-d");
return $created_at ;

    }


    public function donation_waiting($id){
        // $res = donation::with('reservations')->where('user_id',$id) ->first();
        // $wait= $res->donation->where('user_id',$id);
        //      return response()->json($wait);

        $donation = Reservation::with(['donation' => function ($q) use($id) {
  
          $q->with('user')->where('user_id',$id);
    
          }])
          ->where()
          ->get();
          return response()->json($donation);
    
      }
    }


