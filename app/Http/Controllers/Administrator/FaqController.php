<?php

namespace App\Http\Controllers\Administrator;

use App\Model\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();
        return view('backend.faq.index', compact('faqs'));
    }

    public function create(Request $request)
    {
        $data = $this->validate($request, [
           'title' => 'required',
           'content' => 'required',
           'organizer' => 'nullable',
           'customer' => 'nullable',
        ]);
        Faq::create($data);
        return back()->with('success', 'Faq created successfully');
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        $data['customer'] =  $request->customer ? true : false;
        $data['organizer'] =  $request->organizer ? true : false;
        $faq->update($data);
        return back()->with('success', 'Faq updated successfully');
    }

    public function delete(Faq $faq)
    {
        $faq->delete();
        return back()->with('success', 'Faq deleted successfully');
    }
}
