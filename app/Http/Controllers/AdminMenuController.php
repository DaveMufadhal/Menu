<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.menu.index', [
            "menus" => Menu::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:menus',
            'imageURL' => 'nullable|url',
            'price' => 'required|integer|max:100000000',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        

        Menu::create($validatedData);

        return redirect('/admin/menu')->with('success', 'Menu added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', [
            'menu' => $menu,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'name' => 'required|max:255',
            'imageURL' => 'nullable|url',
            'price' => 'required|integer|max:100000000',
            'category_id' => 'required',
            'description' => 'required'
        ];

        if($request->slug != $menu->slug) {
            $rules['slug'] = 'required|unique:menus';
        } 

    
        $validatedData = $request->validate($rules);

        Menu::where('id', $menu->id)->update($validatedData);

        return redirect('/admin/menu')->with('success', 'Menu edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);
        return redirect('admin/menu')->with('success', 'Menu deleted successfully!');
    }
}
