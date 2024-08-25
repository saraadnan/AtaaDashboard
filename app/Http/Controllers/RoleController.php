<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    //
    // public function createRoles(){
    //     // Role::create(['name'=> 'admin' ,'display_name'=>'الأدمن']);
    //     Role::create(['name'=> 'donor' ,'display_name'=>'المتبرع']);
    //     Role::create(['name'=> 'beneficiary' ,'display_name'=>'المستفيد']);
    //     Role::create(['name'=> 'mediator' ,'display_name'=>'الوسيط']);
    // }


    public function getQuantity(){
      
        
        // $don= DB::table('donations')->selectRaw('donation_quantity - res_quantity Run as sub' )->get();




        
        $don = Donation::whereRaw('donation_quantity <> res_quantity')->get();
        return response()->json($don);
    }
}
