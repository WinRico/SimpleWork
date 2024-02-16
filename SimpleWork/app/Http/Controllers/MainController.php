<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    public function dashboard(){

        $task =new Task();
        $project= new Project();
        $user = new User();
        $projectAll = Project::getProject();
        $userAll = User::get();
        if (Auth::user()->roleId == 5){
            return view('dashboard',compact('task','project','user', 'projectAll','userAll'));
        }else{
            return view('memberDashboard',compact('task','project','user', 'projectAll','userAll'));

        }

    }
}
