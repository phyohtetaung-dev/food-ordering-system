<?php

namespace App\Http\Controllers;

use App\Customer;

use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use Session;

class UserController extends Controller {
    public function userSignIn() {
        return view('user/user-sign-in');
    }

    // public function userSignUp() {
    //     return view('user/user-sign-up');
    // }
    
    public function signIn(Request $request) {
        $loginCustomer = Customer::where('name', $request->loginUsername)->where('password', $request->loginPassword)->first();
        if($loginCustomer != null) {
            Session::put('customer', $loginCustomer);
            return redirect()->route('menu.home');
        } else {
            Session::put('username_not_exist', 'Username or password is incorrect');
            return redirect()->back();
        }
    }
    
    // public function signUp(Request $request) {
    //     $customer = new Customer();
    //     try {
    //         $customer->admin_id = Session::get('admin')->id;
    //         $customer->name = $request->username;
    //         $customer->password = $request->password;
    //         $customer->member_fees = 0;
    //         $customer->save();
    //         Session::put('success', 'Successfully Signed Up');
    //     } catch (QueryException $e) {
    //         $errorCode = $e->errorInfo[1];
    //         if($errorCode == 1062){
    //             Session::put('username_exist', $request->username. " is alreday exist");
    //         }
    //     }
    //     return redirect()->back();
    // }
    
    public function userLogout() {
        Session::remove('customer');
        
        return redirect()->route('user.signIn');
    }
}
