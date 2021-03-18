<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menuListing()
    {
        $menus = Menu::with('categories')->published()->get();
        return response()->json([
            'status' => 'success',
            'message' =>'Menu Listing',
            'menus' => $menus
        ]);
    }

    public function categoryListing()
    {
        $categories = Category::with('menu')->published()->get();
        return response()->json([
            'status' => 'success',
            'message' =>'Menu Listing',
            'categories' => $categories
        ]);
    }
}
