<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Models\Task;
use App\Models\User;


class MainController extends Controller
{
    public function dashboard(){

        $task =new Task();
        $project= new Project();
        $user = new User();
        $projectAll = Project::getProject();
        $userAll = User::get();
        return view('dashboard',compact('task','project','user', 'projectAll','userAll'));
    }
    public function memberDashboard(){
        $task =new Task();
        $project= new Project();
        $user = new User();
        $projectAll = Project::get();
        $userAll = User::get();
        return view('memberDashboard',compact('task','project','user', 'projectAll','userAll'));
    }
}
