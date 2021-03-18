<?php

namespace App\Http\Controllers\Administrator;

use App\Model\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Blog\NewBlogRequest;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::orderBy('id', 'desc')
            ->paginate(4);
        return view('backend.blog.index', compact('posts'));
    }

    public function create(NewBlogRequest $request)
    {
        $data =$request->only('title', 'slug', 'video', 'description_raw', 'description');
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save('uploads/blog/' . $fileName);
            $data['image'] = $fileName;
        }
        $blog = Blog:: create($data);
        return redirect(route('backend.blog.details', ['blog' => $blog]))->with('success', 'Blog created successfully');
    }

    public function details(Blog $blog)
    {
        return view('backend.blog.details', compact('blog'));
    }

    public function update(NewBlogRequest $request, Blog $blog)
    {
        if ($request->isMethod('get')) {
            return view('backend.blog.edit', compact('blog'));
        }
        $data =$request->only('title', 'slug', 'video', 'description_raw', 'description');

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save('uploads/blog/' . $fileName);
            $data['image'] = $fileName;
        }

        $blog->update($data);

        return redirect(route('backend.blog.details', ['blog' => $blog]))->with('success', 'Blog updated successfully');
    }

    public function delete(Blog $blog)
    {

    }
}
