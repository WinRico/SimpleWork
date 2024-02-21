<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\FreelanceController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Picture;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('translation', function (\Illuminate\Http\Request $request){
    $lang = $request->get('lang');
    $name = $request->get('name');
    return response()->json([
        'hello' => trans('base.hello',[$name],$lang)
        ]);
});

Route::get('/task', [TaskController::class, 'task'])->middleware('auth')->name('task');
Route::get('/login', [LoginController::class, 'auth'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/edit/profile',  [UserController::class, 'userEditMyProfile'])->name('userEditMyProfile')->middleware('auth');;
Route::get('/scrum',  [TaskController::class, 'SCRUM'])->name('SCRUM');
Route::get('/chat',  [ChatController::class, 'chat'])->name('chat');
Route::post('/edit/photo/{id}',  [Picture::class, 'cutPhoto']);
Route::group(['middleware' => 'admin'], function (){

    Route::get('/',  [MainController::class, 'dashboard']);
    Route::get('/dashboard',  [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/users',  [UserController::class, 'users'])->name('users');
    Route::get('/addUser',  [UserController::class, 'addUser'])->name('addUser');
    Route::post('/addUser',  [UserController::class, 'addUserMain']);
    Route::get('/edit/user/{id}',  [UserController::class, 'editUser'])->name('editUser');
    Route::post('/edit/user/{id}',  [UserController::class, 'editUserMain']);
    Route::get('/delete/user/{id}',  [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/edit/profile/{id}',  [UserController::class, 'userEditProfile'])->name('userEditProfile');

    Route::get('/task/add', [TaskController::class, 'addTask']);
    Route::post('/task/add', [TaskController::class, 'addTaskMain']);
    Route::get('/edit/task/{id}',  [TaskController::class, 'editTask'])->name('editTask');
    Route::post('/edit/task/{id}',  [TaskController::class, 'editTaskMain']);
    Route::get('/delete/task/{id}',  [TaskController::class, 'deleteTask'])->name('deleteTask');

    Route::get('/info/user/{id}', [UserController::class, 'userInfo'])->name('userInfo');
    Route::get('/info/task/{id}',  [TaskController::class, 'infoTask'])->name('infoTask');

});
Route::group(['middleware' => 'Member'], function (){
    Route::get('/memberDashboard',  [MainController::class, 'dashboard'])->name('memberDashboard');
    Route::get('/myTask',  [TaskController::class, 'myTask'])->name('myTask');
    Route::post('/test/task/{id}',  [TaskController::class, 'testTask']);
    Route::get('/back/task/{id}',  [TaskController::class, 'backTask']);
    Route::get('/end/task/{id}',  [TaskController::class, 'endTask']);
    Route::get('/info/task/{id}',  [TaskController::class, 'infoTask'])->name('infoTask');



});
Route::group(['middleware' => 'Freelancer'], function (){
    Route::get('/',  [FreelanceController::class, 'freeDashboard'])->name('freeDashboard');
    Route::get('/freelanceDashboard',  [FreelanceController::class, 'freeDashboard'])->name('freeDashboard');
    Route::get('/openTask',  [FreelanceController::class, 'openTask'])->name('openTask');
});
Route::group(['common' => 'common'], function (){
    Route::get('/chat',  [ChatController::class, 'chat'])->name('freeDashboard');
});

