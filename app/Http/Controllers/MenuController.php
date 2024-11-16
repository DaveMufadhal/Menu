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
            'cart_count' => $request->session()->get('cart', collect([]))->count(),
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
            $request->session()->push('cart', $menu->id);
        } else {
            $request->session()->put('cart', collect([$menu->id]));
        }    
     
        return back();
    }
}
