<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
{
    $loggedInUser = Auth::user();
    return view('layouts.master', compact('loggedInUser'));
}
}
