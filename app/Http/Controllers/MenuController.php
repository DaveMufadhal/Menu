<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index() {
        return view('menu', [
            'categories' => Category::all(),
            'selectedCategory' => false,
            'menus' => Menu::all(),
        ]);
    }
    
    public function show(Category $category)
    {
        return view('menu', [
            'categories' => Category::all(),
            'selectedCategory' => $category,
            'menus' => Menu::all(),
        ]);
    }
}
