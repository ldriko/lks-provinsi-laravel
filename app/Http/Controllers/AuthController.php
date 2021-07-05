<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        }

        abort(401);
    }

    public function register(Request $request)
    {
        $params = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'avatar' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        if (User::query()->where('email', $request->email)->exists()) abort(409);

        $params['role'] = 1;

        User::query()->create($params);
    }

    public function registerDeveloper(Request $request)
    {
        $params = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'password' => 'required',
            'avatar' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        if (User::query()->where('email', $request->email)->exists()) abort(409);

        $params['role'] = 2;

        User::query()->create($params);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
    }
}
