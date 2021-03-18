<?php

namespace App\Http\Controllers\Frontend\Organizer;

use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Categories List',
            'categories' => $categories
        ],200);
    }
}
