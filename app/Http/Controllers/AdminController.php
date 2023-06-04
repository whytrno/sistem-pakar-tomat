<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function user()
    {
        return view('admin.user');
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