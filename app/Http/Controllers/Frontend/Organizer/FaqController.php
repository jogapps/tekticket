<?php

namespace App\Http\Controllers\Frontend\Organizer;

use App\Http\Controllers\Controller;
use App\Model\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $faqs = Faq::organizer()->get();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'FAQ',
                'faqs' => $faqs
            ],200);
        }

        return view('frontend.organizer.faq.index', compact('faqs'));
    }
}
