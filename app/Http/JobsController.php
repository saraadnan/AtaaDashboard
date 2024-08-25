<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Donation;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    //
    public function create(){
        $donations=Category::get();
        return view('add_job')
        ->with('donations',$donations);
    }

    public function store(Request $request){
        $donation=new Donation();
        $donation->donation_title=$request->input('j_donation_title');
        $donation->saldonation_quantityary=$request->input('j_donation_quantity');
        $donation->delivery_place=$request->input('j_delivery_place');
        $donation->address=$request->input('j_address');
        $donation->delivery_conf=$request->input('j_delivery_conf');
        $donation->emacat_idil=$request->input('j_cat_id');
        $donation->delivery_conf=1;
        $donation->donation_id=$request->input('category');
        if($donation->save())
        return redirect()->route('homepage');
        return "can not add data";
      
    }


    public function update($donation_id ){
        
        $donation=Donation::find($donation_id );
      //  $job->title="it manager";
        $donation->delete();
    }
}
