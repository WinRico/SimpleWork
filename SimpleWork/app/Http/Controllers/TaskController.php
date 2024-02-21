<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller{

    // Method to display the form for adding a task
    public function addTask(){

        return view('task.task_add');
    }
    // Method to display tasks based on user's role
    public function task(){
    if (Auth::user()->roleId == 5 || Auth::user()->roleId < 5 && Auth::user()->roleId >= 1) {
        $task = Task::getTask();
        return view('task.task_main', compact('task'));
    }
    else if (Auth::user()->roleId == 6){
        $task = Task::getTask()->where('categoryId',6);
        return view('openSource.openTask', compact('task'));
    }
    return back();
    }

    // Method to display tasks assigned to the logged-in user
    public function myTask(){
        if (Auth::user()->roleId < 5 && Auth::user()->roleId >= 1) {
            $task = Task::getMyTask();
            return view('task.myTask', compact('task'));
        }else if (Auth::user()->roleId == 7 ){
            $task = Task::get()->where('statusId', 4);
            return view('task.myTask', compact('task'));
        }
        return back();
    }

    // Method to display tasks categorized by status for SCRUM
    public function SCRUM(){
        $taskWait = Task::get()->where('statusId', 3);
        $taskInProgress = Task::get()->where('statusId', 1);
        $taskInTest = Task::get()->where('statusId', 4);
        $taskEnd = Task::get()->where('statusId', 2);
        return view('SCRUM.scrumBoard', compact('taskWait','taskInProgress','taskInTest','taskEnd'));
    }

    // Method to change the status of a task to 'In Test'
    public function testTask($id){
        $review = Task::getSingle($id);
        $review->statusId = 4;
        $review->save();

        return redirect()->route('task');
    }

    // Method to change the status of a task to 'In Progress'
    public function backTask($id){
        $review = Task::getSingle($id);
        $review->statusId = 1;
        $review->save();

        return redirect()->route('task');
    }

    // Method to change the status of a task to 'Done'
    public function endTask($id){
        $review = Task::getSingle($id);
        $review->statusId = 2;
        $review->save();

        return redirect()->route('task');
    }

    // Method to display detailed information about a task
    public function infoTask($id){
        $data['infoTask'] = Task::getSingle($id);
        if (!empty($data['infoTask'])){
            return view('task.taskInfo',$data);
        }
        else{
            return back();
        }
    }

    // Method to display the form for editing a task
    public function editTask($id){
        $data['getTask'] = Task::getSingle($id);
        if (!empty($data['getTask'])){
            return view('task.taskEdit',$data);
        }
        else{
            return back();
        }
    }

    // Method to add a new task
    public function addTaskMain(TaskRequest $request){
        $review = new Task();
        $review->title = $request->input('title');
        $review->name = $request->input('title');
        $review->namedCompany = $request->input('namedCompany');
        $review->full_text = $request->input('full_text');
        $review->deadline = $request->input('deadline');
        $review->statusId = 3 ;
        $review->deadUpdate=date_create()->format('Y-m-d H:i:s');
        $review->projectId = 1;
        $review->categoryId = 1;
        $review->save();

        return redirect()->route('task');
    }

    // Method to edit an existing task
    public function editTaskMain($id,TaskRequest $request){
        $review = Task::getSingle($id);
        $review->title = $request->input('title');
        $review->name = $review->title;
        $review->namedCompany = $request->input('namedCompany');
        $review->full_text = $request->input('full_text');
        $review->deadline = $request->input('deadline');
        $review->statusId = 1 ;
        $review->projectId = 1;
        $review->categoryId = 1;
        $review->userId = 1;
        $review->save();
        return redirect()->route('task');
    }

    // Method to delete a task
    public function deleteTask($id){
        $review = Task::getSingle($id);
        $review->delete();
        return redirect()->route('task');
    }
}
