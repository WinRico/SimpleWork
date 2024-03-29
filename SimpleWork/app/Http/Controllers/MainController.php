<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    // Method to display the dashboard based on user's role
    public function dashboard()
    {

        $task = new Task();
        $project = new Project();
        $user = User::get()->where('roleId','!=', 6);
        $projectAll = Project::getProject();
        $userAll = User::get();
        // Check the user's role and render the appropriate dashboard view
        if (Auth::user()->roleId == 5) {
            return view('dashboard', compact('task', 'project', 'user', 'projectAll', 'userAll'));
        } else if (Auth::user()->roleId >= 1 && Auth::user()->roleId < 5) {
            return view('memberDashboard', compact('task', 'project', 'user', 'projectAll', 'userAll'));
        }else if (Auth::user()->roleId == 7) {
            return view('memberDashboard', compact('task', 'project', 'user', 'projectAll', 'userAll'));
        }
        return back();
    }
}
