<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;


class TaskController extends Controller{

    public function addTask(){
        return view('task.task_add');
    }
    public function task(){
        $task = Task::get();
        return view('task.task_main', compact('task'));
    }

    public function editTask($id){
        $data['getTask'] = Task::getSingle($id);
        if (!empty($data['getTask'])){
            return view('task.taskEdit',$data);
        }
        else{
            return back();
        }
    }

    public function addTaskMain(TaskRequest $request){
        $review = new Task();
        $review->title = $request->input('title');
        $review->name = $request->input('title');
        $review->namedCompany = $request->input('namedCompany');
        $review->full_text = $request->input('full_text');
        $review->deadline = $request->input('deadline');
        $review->statusId = 1 ;
        $review->deadUpdate=date_create()->format('Y-m-d H:i:s');
        $review->projectId = 1;
        $review->categoryId = 1;
        $review->userId = 1;
        $review->save();

        return redirect()->route('task');
    }
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
    public function deleteTask($id){
        $review = Task::getSingle($id);
        $review->delete();
        return redirect()->route('task');
    }
}
