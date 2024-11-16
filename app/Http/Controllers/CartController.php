<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;

class CartController extends Controller
{
    public function index(Request $request) {

        $cart = $request->session()->get('cart');
    
    
        $menu = Menu::whereIn('id', $cart->pluck('menu_id'))->get();

        $updatedMenu = $menu->map(function ($item) use ($cart) {
            $cartItem = $cart->firstWhere('menu_id', $item['id']);
            $item['quantity'] = $cartItem['quantity'];
            return $item;
        });

        $totalPrice = $updatedMenu->sum(function ($item) {
            return $item['quantity'] * $item['price'];
        });

        return view('cart',[
            'totalPrice' => $totalPrice,
            'menus' => $updatedMenu,
        ]);
    }

    public function min(Request $request, Menu $menu) {
        $cart = $request->session()->get('cart');
      
        $updatedCart = $cart->map(function ($item) use ($menu) {
            if ($item['menu_id'] == $menu->id) {
                $item['quantity'] = $item['quantity'] - 1;
            }
            return $item;
        })->filter(function ($item) {
            return $item['quantity'] > 0;
        })->values();

        $request->session()->put('cart', $updatedCart);
        
        return back();

    }
    
    public function add(Request $request, Menu $menu) {
        $cart = $request->session()->get('cart');
        
        $updatedCart = $cart->map(function ($item) use ($menu) {
            if ($item['menu_id'] == $menu->id) {
                $item['quantity'] = $item['quantity'] + 1;
            }
            return $item;
        })->filter(function ($item) {
            return $item['quantity'] > 0;
        })->values();

        $request->session()->put('cart', $updatedCart);

        return back();
    }

    public function checkout(Request $request) {
        $cart = $request->session()->get('cart');
   

        Order::insert($cart->toArray());
        $request->session()->forget('cart');
        return redirect('/');

    }
}
