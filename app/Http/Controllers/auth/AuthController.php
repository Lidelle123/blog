<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function registerForm(Request $request)
    {
        return view('layouts.registerForm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'confirm' => 'required|string|same:password',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('profile_images', 'public');
                $user->image = $imagePath;
            }

            $user->save();

            Auth::login($user);

            return redirect()->route('showAnnonce')->with('success', 'Account created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while creating the account. Please try again.']);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('showAnnonce');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('showAnnonce');
    }
}
