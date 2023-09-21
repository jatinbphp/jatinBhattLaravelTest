<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subscription ;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = auth()->user();                   
        $isSubscribed = false;
        $ccLastFour = 0;
        $planDetails = [];

        if(isset($user->subscriptions[0]['user_id'])){
            $ccLastFour = $user->pm_last_four;
            $planDetails =   Product::where('stripe_plan',$user->subscriptions[0]['name'])->first();  
            $isSubscribed = true;
        }

        $planName = Subscription::where('user_id',$user->id)->first();        

        if($planName) {
            $subscription = $user->subscription($planName->name);                
            if($subscription->canceled()){
               // $isSubscribed = false;   
            }
        }
        return view('home',['ccLastFour'=>$ccLastFour,'planDetails'=>$planDetails,'isSubscribed'=>$isSubscribed]);
    }


    /**
     * Purchase products
     *
     * @return response()
     */
    public function purchase()
    {

        $getAllProducts = Product::all()->toArray();
        return view('purchase',['products'=>$getAllProducts]);   
        
    }

     /**
     * Choose plan and display its details
     *
     * @return response()
     */
    public function choosePlan($id)
    {
        $intent = auth()->user()->createSetupIntent();
  
        return view("subscription", compact("plan", "intent"));
    }

    /**
     * Assign admin role to current user
     *
     * @return response()
     */
    public function assignAdminRole()
    {
        
        
        $user = auth()->user();           
        $user->assignRole('super_admin');
        
    }

    
}
