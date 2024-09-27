<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller



{
    // public function index()
    // {
    //     $title = 'Dashboard';
    //     return view('user.dashboard', compact('title'));
    // }
    public function show(User $user)
    {
        $title = 'Dashboard';
        return view('user.dashboard', compact('user', 'title'));
    }
}