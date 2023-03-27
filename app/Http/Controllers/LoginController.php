<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $title = 'Unleash your creativity';
        $posts = Content::all();

        return view('welcome', [
            'title' => $title,
            'posts' => $posts,
            'count' => 0
        ]);
    }
}
