<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Content;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

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

    public function store(StoreRequest $request
    ): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application {
        User::create($request->validated());

        return redirect(route('login'));
    }

    public function forgot_password(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('auth.forgot_password', [
            'title' => 'Forgot password'
        ]);
    }

    public function forgot_password_handle(UpdateUserRequest $request): RedirectResponse
    {
        $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with([
                'status' => __($status)
            ])
            : back()->withErrors([
                'email' => __($status)
            ]);
    }

    public function reset_password(string $token): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('auth.reset_password', [
            'token' => $token
        ]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => $password
                ]);

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);

    }
}
