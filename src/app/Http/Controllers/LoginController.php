<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function login(LoginRequest $request)
    {
        $user_info = $request->only(['email', 'password']);

        if (Auth::attempt($user_info)) {
            return redirect('/');
        } else {
            return back();
        }
    }
}
