<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription ;
class AdminController extends Controller
{



    /**
     * List of users for admin
     *
     * @return response()
     */
    public function users()
    {
        $users = User::all();        
        return view("admin/users", compact("users"));
    }


    /**
     * Cancel Plan
     *
     * @return response()
     */
    public function cancel($id)
    {                
        $user = User::find($id);          
        $planName = Subscription::where('user_id',$id)->first();        
        define("SUB", $planName->name);
        $user->subscription(SUB)->cancel();
        return view("subscription_cancel");
    }

}
