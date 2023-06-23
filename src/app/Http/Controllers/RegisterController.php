<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $user = $request->only(['name', 'email', 'password']);
        User::create($user);

        return redirect('/');
    }
}
