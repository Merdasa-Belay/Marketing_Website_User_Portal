<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    //

    public function index()
    {
        $title = 'Dataset';
        return view('user.dataset', compact('title'));
    }

    public function show(User $user)
    {
        $title = 'Dataset';
        return view('user.dataset', compact('title', 'user'));
    }
}