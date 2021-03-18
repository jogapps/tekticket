<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Model\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::orderBy('id', 'desc')->get();

        return view('frontend.customer.blog.index', compact('posts'));
    }

    public function details(Request $request)
    {
        $blog = Blog::where('slug', $request->slug)->firstOrFail();

        return view('frontend.customer.blog.details', compact('blog'));
    }
}
