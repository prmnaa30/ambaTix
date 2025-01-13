<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class contentPaymentController extends Controller
{
    public function index()
    {
        $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
        $categories = EventCategory::all();
        return view('contentPayment', compact('layout', 'categories'));
    }

    public function paymentDetail()
    {
        $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
        $categories = EventCategory::all();
        return view('paymentDetail', compact('layout', 'categories'));
    }

    public function paymentMethod()
    {
        $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
        $categories = EventCategory::all();
        return view('paymentMethod', compact('layout', 'categories'));
    }
}
