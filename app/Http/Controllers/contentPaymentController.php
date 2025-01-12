<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contentPaymentController extends Controller
{
    public function index()
    {
        $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
        return view('contentPayment', compact('layout'));
    }

    public function paymentDetail()
    {
        $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
        return view('paymentDetail', compact('layout'));
    }
}
