<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class HomeController extends Controller
{
    //
    public function index(){
        $cats=Category::select('donation_id','donation_title')->get();
        return view('index')
        ->with('cats',$cats)
        ;
    }
}
