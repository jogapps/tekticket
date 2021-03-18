<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Menu;
use Str;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('id', 'desc')->get();
        return view('backend.menus.index', compact('menus'));
    }

    public function details(Menu $menu)
    {
        $menus = Menu::get();
        return view('backend.menus.details', compact('menu', 'menus'));
    }

    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
           'name' => 'required'
        ]);
        $menu->name = $request->name;
        $menu->save();
        return back()->with('success', 'Menu updated successfully');
    }

    public function disable(Menu $menu)
    {
        $menu->published = false;
        $menu->save();
        return back()->with('success', 'Menu disabled successfully');
    }

    public function enable(Menu $menu)
    {
        $menu->published = true;
        $menu->save();
        return back()->with('success', 'Menu enabled successfully');
    }

    public function create(Request $request)
    {
        $data = $this->validate($request,[
            'name' => 'required'
        ]);

        $data['slug'] = Str::slug($request->name);

        Menu::create($data);

        return back()->with('success','Menu created successfully');
    }

    public function addCategory(Request $request)
    {
        $data = $this->validate($request,[
            'name' => 'required'
        ]);
        $menu = Menu::findOrFail($request->menu_id);
        $data['slug'] = Str::slug($request->name);
        $menu->categories()->create($data);
        return back()->with('success','Category added successfully');
    }

    public function disableCategory(Category $category)
    {
        $category->published = false;
        $category->save();
        return back()->with('success', 'Category disabled successfully');
    }

    public function enableCategory(Category $category)
    {
        $category->published = true;
        $category->save();
        return back()->with('success', 'Category enabled successfully');
    }

    public function updateCategory(Request $request, Category $category)
    {
        $this->validate($request, [
           'name' => 'required',
           'menu' => 'required',
        ]);
        $category->name = $request->name;
        $category->menu_id = $request->menu;
        $category->save();

        return back()->with('success', 'Category updated successfully');
    }
}
