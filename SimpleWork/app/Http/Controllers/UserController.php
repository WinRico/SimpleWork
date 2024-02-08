<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users(){
        $userAll = User::get()->all();
        return view('user.users', compact('userAll'));
    }
    public function addUser(){
        return view('user.addUser');
    }
    public function editUser($id){
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])){
            return view('user.editUser',$data);
        }
        else{
            return back();
        }
    }
    public function addUserMain(UserRequest $request){
        $review = new User();
        $review->firstname = $request->input('firstname');
        $review->lastname = $request->input('lastname');
        $review->email = $request->input('email');
        $review->date_coming =date_create()->format('Y-m-d H:i:s');
        $review->password = Hash::make($request->input('password'));
        $review->roleId = $request->input('role');
        $review->save();
        return redirect()->route('users');
    }
    public function editUserMain($id,UserRequest $request){
        $review = User::getSingle($id);
        $review->firstname = $request->input('firstname');
        $review->lastname = $request->input('lastname');
        $review->email = $request->input('email');
        $review->password = Hash::make($request->input('password'));
        $review->roleId = $request->input('role');
        $review->save();
        return redirect()->route('users');
    }
    public function deleteUser($id){
        $review = User::getSingle($id);
        $review->delete();
        return redirect()->route('users');
    }


}
