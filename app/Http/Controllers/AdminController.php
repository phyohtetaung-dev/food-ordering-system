<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Order;
use App\OrderMenu;
use App\Temp;

use Socialite;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use Session;

class AdminController extends Controller {
    public function index() {
        if(Session::get('admin')) {
            $adminId = Session::get('admin')->id;
            $adminName = Session::get('admin')->name;
            
            $temp = Temp::where('admin_id', $adminId)->first();
            
            if($temp != null) {
                $temp = Temp::where('admin_id', $adminId)->delete();
            }
            
            $orders= Order::where('status', 0)->where('admin_id', $adminId)->get();

            return view('/admin/show-admin', [
                'adminName' => $adminName,
                'orders' => $orders
            ]);
        } 
    }
    
    public function orderDetail($id) {
        $adminName = Session::get('admin')->name;
        
        $order = Order::find($id);
        $totalPrice = $order->price;
        
        $order_menus = OrderMenu::where('order_id', $id)->get();
        
        return view('/admin/order-detail', [
            'adminName' => $adminName,
            'order_id' => $id,
            'order_details' => $order_menus,
            'totalPrice' => $totalPrice
        ]);
    }
    
    public function deliver($id) {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        return redirect()->route('admin.index');
    }
    
    public function storeAdminData(Request $request) {
        $admin = new Admin();
        $adminExist = Admin::where('email', $request->email)->first();
        if($adminExist == null) {
            $admin->name = $request->username;
            $admin->email = $request->email;
            $admin->password = $request->password;
            $admin->save();
            $loginAdmin = Admin::where('email', $request->email)->first();
            Session::put('admin', $loginAdmin);
            return redirect('/subscribe');
        } else {
            Session::put('exist_email', $request->email. " is alreday exist");    
            return redirect()->back();
        }   
    }
    
    public function loginAdmin(Request $request) {
        $loginAdmin = Admin::where('email', $request->loginEmail)->where('password', $request->loginPassword)->first();
        if($loginAdmin != null) {
            Session::put('admin', $loginAdmin);
            if($loginAdmin->startSubscribe != null) {
                $currentDate = new Carbon;
                $endSubscribe = $loginAdmin->endSubscribe;

                if($endSubscribe <= $currentDate) {
                    return redirect('/subscribe');
                } else {
                    return redirect()->route('admin.index');
                }
            } else {
                return redirect('/subscribe');
            }
        } else {
            Session::put('email_not_exist', 'Email or password is incorrect');
            
            return redirect()->back();
        }
    }
    
    public function redirect() {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function callback() {
        $user = Socialite::driver('facebook')->user();
        $loginAdmin = Admin::where('facebook_id', $user->id)->first();
        if($loginAdmin != null) {
            Session::put('admin', $loginAdmin);
            if($loginAdmin->startSubscribe != null) {
                $currentDate = new Carbon;
                $endSubscribe = $loginAdmin->endSubscribe;

                if($endSubscribe <= $currentDate) {
                    return redirect('/subscribe');
                } else {
                    return redirect()->route('admin.index');
                }
            } else {
                return redirect('/subscribe');
            }
        } else {
            $admin = new Admin();
            $admin->facebook_id = $user->id;
            $admin->name = $user->name;
            $admin->email = $user->email;
            $admin->save();
            $loginAdmin = Admin::where('facebook_id', $user->id)->first();
            Session::put('admin', $loginAdmin);
            return redirect('/subscribe');
        }
    }
    
    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }
    
    public function googleCallback() {
        $user = Socialite::driver('google')->user();
        $loginAdmin = Admin::where('google_id', $user->id)->first();
        if($loginAdmin != null) {
            Session::put('admin', $loginAdmin);
            if($loginAdmin->startSubscribe != null) {
                $currentDate = new Carbon;
                $endSubscribe = $loginAdmin->endSubscribe;

                if($endSubscribe <= $currentDate) {
                    return redirect('/subscribe');
                } else {
                    return redirect()->route('admin.index');
                }
            } else {
                return redirect('/subscribe');
            }
        } else {
            $admin = new Admin();
            $admin->google_id = $user->id;
            $admin->name = $user->name;
            $admin->email = $user->email;
            $admin->save();
            $loginAdmin = Admin::where('google_id', $user->id)->first();
            Session::put('admin', $loginAdmin);
            return redirect('/subscribe');
        }
    }
}
