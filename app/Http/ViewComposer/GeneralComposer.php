<?php

namespace App\Http\ViewComposer;

use App\Model\{Event, Menu, Category, Organizer, OtherInformation, Page};
use Illuminate\View\View;

class GeneralComposer
{
    public function compose(View $view)
    {
        $menus = Menu::with('categories')->published()->inRandomOrder()->get();
        $categories = Category::with('events')->published()->inRandomOrder()->get();
        $generalPages = Page::general()->get();
        $randomEvents = Event::inRandomOrder()->published()->take(3)->get();
        $organizers = Organizer::limit(5)->get();
        $information = OtherInformation::first();
        $view->with([
            'menus' => $menus,
            'generalPages' => $generalPages,
            'categories' => $categories,
            'randomEvents' => $randomEvents,
            'organizers' => $organizers,
            'information' => $information
        ]);
    }
}
