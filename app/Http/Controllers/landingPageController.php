<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class landingPageController extends Controller
{
    public function index()
    {
        $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
        $categories = EventCategory::all();

        $events = Event::take(8)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('home.landing', compact('layout', 'categories', 'events'));
    }
}
