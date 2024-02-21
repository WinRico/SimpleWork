<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // Method to display the login form
    public function auth()
    {
        return view('auth.login');
    }

    // Method to handle the login attempt
    public function login(LoginRequest $request)
    {
        // Check if remember me checkbox is checked
        $remember = !empty($request->remember) ? true : false;

        // Attempt to authenticate user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            // Redirect based on user role
            if (Auth::user()->roleId == 5) {
                return redirect(route('dashboard'));
            } else if (Auth::user()->roleId >= 1 && Auth::user()->roleId < 5) {
                return redirect(route('memberDashboard'));
            } else if (Auth::user()->roleId == 7) {
                return redirect(route('memberDashboard'));
            } else if (Auth::user()->roleId == 6) {
                return redirect(route('freeDashboard'));
            }
        }

        // If authentication fails, check if email or password is incorrect
        $review = User::all();
        foreach ($review as $rev) {
            if ($request->get('email') != $rev->email) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'email' => 'Email не дійсний' // Email is not valid
                    ]);
            } else {
                return back()
                    ->withInput()
                    ->withErrors([
                        'password' => 'Пароль не вірний' // Password is incorrect
                    ]);
            }
        }
    }

    // Method to handle user logout
    public function logout()
    {
        auth("web")->logout(); // Logout the user
        return view('auth.login'); // Redirect to login page
    }
}
