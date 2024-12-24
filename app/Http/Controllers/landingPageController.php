<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingPageController extends Controller
{
    public function index()
    {
        $layout = auth()->check() ? 'layouts.app' : 'layouts.app';
        return view('landing', compact('layout'));
    }
}
