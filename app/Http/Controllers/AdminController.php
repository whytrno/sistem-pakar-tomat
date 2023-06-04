<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Livewire\Component;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function user()
    {
    $users = User::select('*')->get();
   return view('admin.user', ['users' => $users]);

    }

    public function gejala()
    {
        return view('admin.gejala');
    }
    public function keyakinan()
    {
        return view('admin.keyakinan');
    }
    public function hasil()
    {
        return view('admin.hasil');
    }
    
}
