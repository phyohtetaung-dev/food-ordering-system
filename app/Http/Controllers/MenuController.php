<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Menu;
use App\Order;
use App\Customer;
use App\OrderMenu;
use App\UserInfo;
use App\Temp;
use App\ClientInfo;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use DB;
use App\Events\FormSubmitted;

class MenuController extends Controller {
    public function home() {
        if(Session::has('customer')) {
            $categories = Category::where('admin_id', Session::get('customer')->admin_id)->get();
            return view('menu/home', [
                'categories' => $categories
            ]);
        } else {
            return view('user/user-sign-in');
        }
    }
    
    public function contact() {
        if(Session::has('customer')) {
            return view('menu/contact');
        } else {
            return view('user/user-sign-in');
        }
    }
    
    public function about() {
        if(Session::has('customer')) {
            return view('menu/about');
        } else {
            return view('user/user-sign-in');
        }
    }
    
    public function menus() {
        if(Session::has('customer')) {
            
            //actived category name
            $category = Category::where('admin_id', Session::get('customer')->admin_id)->get()->first();
            $activedCategory = $category->name;
            
            $categories = Category::where('admin_id', Session::get('customer')->admin_id)->get();
            $menus = Menu::where('categoryId', 1)->where('admin_id', Session::get('customer')->admin_id)->get();
            return view('menu/show-menu', [
                //actived category name
                'activedCategory' => $activedCategory,
                
                'categories' => $categories,
                'menus' => $menus
            ]);
        } else {
            return view('user/user-sign-in');
        }
    }

    public function relatedMenus($id) {
        if(Session::has('customer')) {
            
            //actived category name
            $category = Category::find($id);
            $activedCategory = $category->name;
            
            $categories = Category::where('admin_id', Session::get('customer')->admin_id)->get();
            $menus = Menu::where('categoryId', $id)->where('admin_id', Session::get('customer')->admin_id)->get();
            return view('menu/show-menu', [
                //actived category name
                'activedCategory' => $activedCategory,
                
                'categories' => $categories,
                'menus' => $menus,
                'id' => $id
            ]);
        } else {
            return view('user/user-sign-in');
        }
    }

    public function getAddToCart(Request $request, $id) {
        $menu = Menu::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($menu, $menu->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('menu.menus');
    }

    public function getCart() {
        if(Session::has('customer')) {
            if(!Session::has('cart')) {
                return view('menu/view-cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('menu/view-cart', [
                'menus' => $cart->items, 
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty
            ]);
        } else {
            return view('user/user-sign-in');
        }
    }
    
    public function addQty(Request $request, $id) {
        $menu = Menu::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($menu, $menu->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('menu.viewCart');
    }
    
    public function subQty(Request $request, $id) {
        $menu = Menu::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->sub($menu, $menu->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('menu.viewCart');
    }

    public function deleteItem(Request $request, $id) {
        $cart =  Session::has('cart') ? Session::get('cart') : null;
            if(count($cart->items) > 1) {
                foreach($cart->items as $key => $value) {
                    if($value['item']->id == $id) {
                        unset($cart->items[$key]);
                        $cart->totalQty = $cart->totalQty - $value['qty'];
                        $cart->totalPrice = $cart->totalPrice - $value['price'];
                    }
                }
                $request->session()->put('cart', $cart);
            } else {
                Session::remove('cart');
            }
        return redirect()->route('menu.viewCart');
    }

    public function delete() {
        Session::remove('cart');
        return redirect()->route('menu.viewCart');
    }

    public function checkout(Request $request) {
        if(!Session::has('cart')) {
            return view('menu/view-cart');
        }
        
        $u_info = new UserInfo();
        $c_info = ClientInfo::where('admin_id', Session::get('customer')->admin_id)->where('ip', $u_info->get_ip())->first();
        
        if($c_info) {
            // Get cart and it's final price
            $finalCarts = Session::get('cart');
            $total_price = $finalCarts->totalPrice;
            
            // Get login customer and it's member fees
            $customer = Customer::find(Session::get('customer')->id);
            $member_fees = $customer->member_fees;
            
            //If total price is greater than member fees
            if($total_price > $member_fees) {
                Session::put('member_fees_not_enough', 'Member fees not enough');
            } 
            
            //If total price is less than member fees
            else {
                
                // Save data to orders table
                DB::table('orders')->insert([
                    'admin_id' => Session::get('customer')->admin_id,
                    'customer_id' => Session::get('customer')->id,
                    'pc_no' => $c_info->pc,
                    'price' => $total_price,
                    'status' => 0
                ]);
                
                // Get last inserted id from orders table
                $lastInsertedId = DB::getPdo()->lastInsertId();
                
                // Save data to order_menus table
                foreach($finalCarts->items as $finalCart) {
                    $order_menu = new OrderMenu();
                    $order_menu->order_id = $lastInsertedId;
                    $order_menu->menu_id = $finalCart['item']->id;
                    $order_menu->qty = $finalCart['qty'];
                    $order_menu->save();
                }
                
                // Update member fees
                $member_fees = $member_fees - $total_price;
                $customer->member_fees = $member_fees;
                $customer->save();
                
                // Save request to temps database
                $temp = new Temp();
                $temp->admin_id = Session::get('customer')->admin_id;
                $temp->req = 1;
                $temp->save();
                
                $temp = Temp::where('admin_id', Session::get('customer')->admin_id);
                $count = $temp->count();
                // session()->put('notif', 'Successfully ordered');
                Session::remove('cart');
                event(new FormSubmitted($count));
            }
        } else {
            Session::put('pc_not_found', 'You do not have permission to access');
        }
        
        return redirect()->route('menu.viewCart');
        
    }
}
