<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoriesController extends Controller
{
    //
    public function index(){
       // $categories=Category::get();
       $categories=Category::where('delivery_conf',1)
       //->orWhere('name','like','%it%')
       ->orderBy('donation_id','desc')->
       paginate(10)->
       get();
        return response($categories);
       
    }

    public function store(){

         $cat=new Category();
         $cat->name="accountant";
         $cat->status=0;
         $cat->save();
    }
}
