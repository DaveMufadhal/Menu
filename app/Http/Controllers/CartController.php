<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CartController extends Controller
{
    public function index(Request $request) {
        $cart = $request->session()->get('cart');
        $menu = Menu::whereIn('id', $cart)->get();

        $cartQuantities = $cart->countBy();

        $updatedMenu = $menu->map(function ($item) use ($cartQuantities) {
            $item['quantity'] = $cartQuantities->get($item['id'], 0);
            return $item;
        });

        return view('cart',[
            'menus' => $updatedMenu,
        ]);
    }
}
