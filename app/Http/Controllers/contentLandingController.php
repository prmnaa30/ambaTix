<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contentLandingController extends Controller
{
    public function index()
    {
        $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
        return view('contentLanding', compact('layout'));
    }
}
