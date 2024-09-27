<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show(User $user) // Route model binding
    {
        $title = 'Report';
        return view('user.reports', compact('user', 'title'));
    }
}