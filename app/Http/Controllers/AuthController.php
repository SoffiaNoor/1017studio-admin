<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        // $information = Information::first();
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        } else {
            return redirect('/login')->with('error', 'Email atau Password tidak sesuai');
        }
    }

    public function showRegistrationForm()
    {
        // $information = Information::first();
        return view('register');
    }

    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = Hash::make($validatedData['password']);

            $user->save();

            return redirect()->route('register')->with('success', 'Registration successful');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update information. Please try again.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
