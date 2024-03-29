<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $social = \Socialite::driver($provider)->user();
            $user = \App\Models\User::where('email', '=', $social->email)->first();


            if (!$user) {
                $user = \App\Models\User::create([
                    'name' => $social->name,
                    'nickname' => $social->nickname,
                    'email' => $social->email,
                    'email_verified_at' => \Carbon\Carbon::now(),
                ]);
            }

            \Auth::loginUsingId($user->id, true);

            return redirect()->route('home.index')->with('success', 'Hello ' . $user->name);
        } catch (\Throwable $th) {
            \Log::error($th);
            dd($th);
            return redirect()->route('home.index')->with('success', 'Sign in failed because of an internal error');
        }
    }
}
