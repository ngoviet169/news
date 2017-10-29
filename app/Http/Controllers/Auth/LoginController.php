<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.login');
        }

        $this->validate($request, [
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);

        $login = $this->attemptLogin($request);

        if (!$login) {
            $message = 'Email or password are not match !';

            return view('admin.login')->with(compact('message'));
        }

        return redirect()->route('news.index');
    }

    public function logout()
    {
        $this->guard()->logout();

        return redirect()->route('login');
    }
}
