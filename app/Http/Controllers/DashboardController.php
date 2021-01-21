<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $latestPost = Post::latest()->limit(6)->get();
        return view('dashboard', compact('latestPost'));
    }
}
