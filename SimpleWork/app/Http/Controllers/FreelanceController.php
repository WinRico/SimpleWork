<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreelanceController extends Controller
{
    // Method to display the dashboard for freelancers
    public function freeDashboard(){
        return view('openSource.freeDashboard');
    }

}
