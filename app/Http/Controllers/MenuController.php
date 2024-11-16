<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(Request $request) {
        return view('menu', [
            'cart_count' => $request->session()->get('cart', collect())->sum('quantity') ?? 0,
            'categories' => Category::all(),
            'selectedCategory' => false,
            'menus' => Menu::all(),
        ]);
    }
    
    public function filter(Request $request, Category $category)
    {
        return view('menu', [
            'cart_count' => $request->session()->get('cart', collect([]))->count(),
            'categories' => Category::all(),
            'selectedCategory' => $category,
            'menus' => Menu::all(),
        ]);
    }

    public function cart(Request $request, Menu $menu)
    {
        if($request->session()->get('cart')) {
            $cart = $request->session()->get('cart');
            if($cart->contains('menu_id', $menu->id)) {
                $updatedCart = $cart->map(function ($item) use ($menu) {
                    if ($item['menu_id'] == $menu->id) {
                        $item['quantity'] = $item['quantity'] += 1;
                    }
                    return $item;
                });
                $request->session()->put('cart', $updatedCart);
            } else {
                $request->session()->push('cart', collect(["quantity" => 1, "menu_id" => $menu->id]));
            }
        } else {
            $cart = collect([["quantity" => 1, "menu_id" => $menu->id]]);
            $request->session()->put('cart', $cart);
        };
        
        
     
        return back();
    }
}
