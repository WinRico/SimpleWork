<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function auth()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $remember = !empty($request->remember)?true:false;
        if (Auth::attempt(['email' => $request->email , 'password' => $request->password],$remember)) {
            if (Auth::user()->roleId == 5) {
                return redirect(route('dashboard'));
            } else if (Auth::user()->roleId >= 1 && Auth::user()->roleId < 5) {
                return redirect(route('memberDashboard'));
            }

        }
        $review = User::all();
        foreach ($review as $rev) {
            if ($request->get('email') != $rev->email) {

                return back()
                    ->withInput()
                    ->withErrors([
                        'email' => 'Email не дійсний'
                    ]);
            } else {
                return back()
                    ->withInput()
                    ->withErrors([
                        'password' => 'Пароль не вірний'
                    ]);
            }
        }
    }
    public function logout(){
        auth("web")->logout();
        return view('auth.login');
    }
}
