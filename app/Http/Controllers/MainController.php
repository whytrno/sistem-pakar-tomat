<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function loginProcess(Request $request)
    {
        if (
            Auth::attempt([
                'email' => $request->get('email'),
                'password' => $request->get('password'),
            ])
        ) {
            return redirect('/diagnosa');
        } else {
            return redirect('/login')->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }
    }

    public function registerProcess(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->save();

            return redirect('/login')->with('success', 'Registration successful. Please login to continue.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Registration failed. Please try again.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout successful');
    }

    public function diagnosa()
    {
        return view('diagnosa.index');
    }

    public function hasil()
    {
        return view('diagnosa.hasil');
    }
}