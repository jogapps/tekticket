<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Help;
use Str;
use Illuminate\Http\Request;

class HelpsController extends Controller
{
    public function index()
    {
        $helps = Help::all();

        return view('backend.help.index', compact('helps'));
    }

    public function update(Request $request, Help $help)
    {
        if ($request->isMethod('get')) {
            return view('backend.help.edit', compact('help'));
        }

        $data = $request->only('name', 'content', 'video');
        $help->update($data);
        return redirect(route('backend.help.index'))
            ->with('success', 'Page updated successfully');
    }
}
