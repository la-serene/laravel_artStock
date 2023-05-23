<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Faker\Factory as Faker;
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
        if (!$pass->isEmpty()) {
            $hashed = $pass[0]->password;

            $user = User::where('email', $credentials['email'])->first();
            if ($user) {
                if (Hash::check($credentials['password'], $hashed)) {
                    Auth::login($user);
                    $request->session()->regenerate();
                    return redirect()->route('user.index');
                }
            }
        }

        return redirect()->route('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'Wrong password'
        ])->onlyInput('email');
    }

    public function store(StoreUserRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $request = $request->validated();
        $request['user_tag'] = substr($request['username'], 0, 4) . Faker::create()->numberBetween(1000, 9999);
        $request['password'] = Hash::make($request['password']);
        User::create($request);

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
        $request = $request->validated();
        $status = Password::sendResetLink(
            $request,
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
        $email = $request->input('email');
        return view('auth.reset_password', [
            'title' => 'Change your password',
            'token' => $token,
            'email' => $email,
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
                $password = Hash::make($password);
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
