<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subscription;
 
class PlanController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $plans = Plan::get();
  
        return view("plans", compact("plans"));
    }  
  
    /**
     * Show product data
     *
     * @return response()
     */
    public function show(Product $plan, Request $request)
    {
        
        $intent = auth()->user()->createSetupIntent();
  
        return view("subscription", compact("plan", "intent"));
    }

    /**
     * subscribed product
     *
     * @return response()
     */
    public function subscription(Request $request)
    {        

        $plan = Product::where('stripe_plan',$request->plan)->first();  
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                        ->create($request->token);
        $user = auth()->user();        
        $user->assignRole($plan->name);        
        return view("subscription_success");
    }


    /**
     * Cancel Plan
     *
     * @return response()
     */
    public function cancel_subscription()
    {                
        $user = auth()->user();          
        $planName = Subscription::where('user_id',$user->id)->first();        
        define("SUB", $planName->name);
        $user->subscription(SUB)->cancel();
        return view("subscription_cancel");
    }

    
}
