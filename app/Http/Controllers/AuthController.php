<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    public function __construct()
    {
        View::share([
            'title' => 'Login'
        ]);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => ['required', 'email'],
            "password" => ['required', 'min:8']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            $user = User::where(['email' => $request->email])->first();
            auth()->login($user, $request->remember_me);
            if (!$user->is_admin) {
                return redirect()->route('profile');
            }
            return redirect()->intended('/');
        } else {
            return redirect()->route('login')->with([
                'login' => 'email/password are incorrect'
            ]);
        }
    }

    public function getRandomEmp()
    {
        $user = User::whereIsAdmin(0)->inRandomOrder()->first();
        return $user;
    }
}
