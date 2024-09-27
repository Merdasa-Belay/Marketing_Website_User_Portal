<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show(Request $request)
    {
        if ($request->user()) {
            // User is authenticated
            $user = $request->user(); // Retrieve the authenticated user
            $title = 'Report';
            return view('user.reports', compact('user', 'title'));
        } else {
            // User is not authenticated
            return redirect()->route('login');
        }
    }
}