<?php

namespace App\Http\Controllers\Auth;

use App\Models\Event;
use App\Models\EventCategory;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function editProfile()
    {
        $user = auth()->user();
        $categories = EventCategory::all();
        $events = Event::all();
        return view('auth.editProfile')->with('success', 'Edit Profile Berhasil')->with(compact('user', 'categories', 'events'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());
        return redirect()->back()->with('success', 'Profile berhasil diupdate');
    }

    public function editPassword()
    {
        $categories = EventCategory::all();
        $events = Event::all();
        return view('auth.editPassword', compact( 'categories', 'events'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $user = auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Password lama tidak cocok']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('landing')->with('success', 'Password berhasil diupdate');
    }

}
