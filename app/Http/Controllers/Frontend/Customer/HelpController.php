<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use App\Model\Help;
use App\Model\Page;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        $helps = Help::all();
        $topQuestionsPages = Page::topQuestion()->get();
        return view('frontend.customer.help.index', compact('helps', 'topQuestionsPages'));
    }

    public function details(Help $help)
    {
        return view('frontend.customer.help.details', compact('help'));
    }
}
