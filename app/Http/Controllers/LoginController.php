<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Testing\Fluent\Concerns\Has;

class LoginController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $title = 'Unleash your creativity';

        return view('guests.index', [
            'title' => $title,
        ]);
    }

    public function login(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $data = '$2y$10$9WC7dScFgU52D0G832i5J.tSqroITkKVbfzj89YP1zjnliNMFhZNi'.PHP_EOL.Hash::make('1234');
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

        $pass = DB::table('users')->where('email', $credentials['email'])->get('password');
        $hashed = $pass[0]->password;

        $user = User::query()->where('email', $credentials['email'])->first();
        if ($user) {
            if (Hash::check($credentials['password'], $hashed)) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->route('user.index');
            }
        }

        return redirect()->route('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'Wrong password'
        ])->onlyInput('email');
    }

    public function store(StoreRequest $request
    ): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('login');
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

    public function reset_password(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $token = $request->input('token');
        return view('auth.reset_password', [
            'title' => 'Change your password',
            'token' => $token,
        ]);
    }

    public function update_password(Request $request): RedirectResponse
    {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:1|confirmed',
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
