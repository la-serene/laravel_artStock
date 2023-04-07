<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $title = 'Unleash your creativity';
        $posts = Content::all();

        return view('guests.index', [
            'title' => $title,
            'posts' => $posts,
        ]);
    }

    public function login(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('auth.login', [
            'title' => 'Log In'
        ]);
    }

    public function signup(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('auth.signup', [
            'title' => 'Sign up'
        ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::query()->where('email', $credentials['email'])->first();
        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect(route('user.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'Wrong password'
        ])->onlyInput('email');
    }

    public function store(StoreRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application {
        User::create($request->validated());

        return redirect(route('login'));
    }
}
