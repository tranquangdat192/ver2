<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            $user = Auth::user();
            return view('components.account',['user' => $user]);
        }
        return view('components.account');
    }
}
