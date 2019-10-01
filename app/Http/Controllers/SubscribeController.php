<?php

namespace App\Http\Controllers;

use App\Admin;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use Session;

class SubscribeController extends Controller {
    public function index() {
        return view('/subscribe');
    }
    
    public function store(Request $request, $id) {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:          
            $token = $_POST['stripeToken'];
            
            //Create a Customer
            $customer =\Stripe\Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $token,
            ));
            
            $charge = \Stripe\Charge::create([
                'amount' => 5000000,
                'currency' => 'mmk',
                'description' => 'Example charge',
                'customer' => $customer->id,
            ]);
            
            // For monthly subscription
            $adminId = Session::get('admin')->id;
            $admin = Admin::find($adminId);
            $admin->startSubscribe = now();
            if($id == 1) {
                $admin->endSubscribe = Carbon::now()->addMonths(1);
            } else if ($id == 2) {
                $admin->endSubscribe = Carbon::now()->addMonths(6);
            } else if ($id == 3) {
                $admin->endSubscribe = Carbon::now()->addMonths(12);
            } else {
                $admin->endSubscribe = null;
            }
            $admin->save();

        return \Redirect::route('admin.index');
    }
}
