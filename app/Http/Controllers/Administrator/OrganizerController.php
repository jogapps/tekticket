<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Organizer;
use Illuminate\Http\Request;
use Image;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizers = Organizer::withCount('events')->orderBy('events_count')->get();
        return view('backend.organizers.index', compact('organizers'));
    }

    public function show(Organizer $organizer)
    {
        return view('backend.organizers.show', compact('organizer'));
    }

    public function update(Request $request, Organizer $organizer)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $organizer->name = $request->name;
        $organizer->phone = $request->phone;
        $organizer->country = $request->country;
        $organizer->state = $request->state;
        $organizer->city = $request->city;
        $organizer->address = $request->address;
        $organizer->facebook = $request->facebook;
        $organizer->twitter = $request->twitter;
        $organizer->instagram = $request->instagram;
        $organizer->description = $request->description;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            if ($organizer->profile_image && file_exists('uploads/organizers/' . $organizer->profile_image)) {
                unlink('uploads/organizers/' . $organizer->profile_image);
            }
            $organizer['profile_image'] = $fileName;
        }
        $organizer->save();

        return back()->with('success', 'Profile updated successfully');
    }
}
