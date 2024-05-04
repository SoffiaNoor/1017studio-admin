<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();

        $loggedInUser = Auth::user();


        return view("home", compact('loggedInUser','user'));
    }

    public function login()
    {
        return view("login");
    }
}
