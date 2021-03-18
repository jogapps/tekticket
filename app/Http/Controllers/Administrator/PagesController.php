<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Page\NewPageRequest;
use App\Model\Page;
use Illuminate\Http\Request;
use Image;
use Str;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->get();
        return view('backend.pages.index', compact('pages'));
    }

    public function create(NewPageRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('');
        }
        $data = $request->only('title', 'slug', 'content');
        Page::create($data);
        return redirect(route('backend.dashboard.index'))
            ->with('success', 'Page created successfully');
    }

    public function update(NewPageRequest $request, Page $page)
    {
        if ($request->isMethod('get')) {
            return view('backend.pages.edit', compact('page'));
        }
        $data = $request->only('title', 'slug', 'content', 'video', 'general', 'top_question');

        if ($request->hasFile('image')) {
            if ($page->image && file_exists("uploads/pages/{$page->image}")) {
                unlink("uploads/pages/{$page->image}");
            }
            $fileName = Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save('uploads/pages/' . $fileName);
            $data['image'] = $fileName;
        }

        $page->update($data);
        return redirect(route('backend.pages.index'))
            ->with('success', 'Page updated successfully');
    }

    public function delete(Page $page)
    {
        $page->delete();
        return back()->with('success', 'Page deleted successfully');
    }
}
