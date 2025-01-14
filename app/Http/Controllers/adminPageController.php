<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminPageController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function userData()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }
}
