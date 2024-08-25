<?php
 
namespace App\Http\Controllers\Controller;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Routing\Controller as RoutingController;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return 'Welcome user' ;
        
    }
}