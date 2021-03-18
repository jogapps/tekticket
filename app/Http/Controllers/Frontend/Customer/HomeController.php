<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Model\Event;
use App\Model\Faq;
use App\Http\Controllers\Controller;
use App\Model\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $justAnnounced = Event::orderBy('id', 'desc')->limit(6)->get();
        return view('frontend.customer.index', compact('justAnnounced'));
    }

    public function getFaqs()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();
        return view('frontend.customer.others.faq', compact('faqs'));
    }

    public function getPage(Request $request)
    {
        $page = Page::where('slug', $request->keyword)->firstOrFail();
        return view('frontend.customer.others.page', compact('page'));
    }
}
