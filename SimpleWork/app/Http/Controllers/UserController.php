<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Method to display all users
    public function users(){
        $userAll = User::getUser();
        return view('user.users', compact('userAll'));
    }

    // Method to display the form for adding a user
    public function addUser(){
        return view('user.addUser');
    }

    // Method to display the form for editing a user's profile
    public function userEditProfile($id){
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])){
            return view('user.userEditProfile',$data);
        }
        else{
            return back();
        }
    }

    // Method to display the form for editing the currently logged-in user's profile
    public function userEditMyProfile(){
        $data['getRecord'] = User::getSingle(Auth::id());
        if (!empty($data['getRecord'])) {
            return view('user.userEditProfile', $data);
        } else {
            return back();
        }
    }

    // Method to display the form for editing a user
    public function editUser($id){
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])){
            return view('user.editUser',$data);
        }
        else{
            return back();
        }
    }

    // Method to display detailed information about a user
    public function userInfo($id){
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])){
            return view('user.userInfo',$data);
        }
        else{
            return back();
        }
    }

    // Method to add a new user
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

    // Method to edit an existing user
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

    // Method to delete a user
    public function deleteUser($id){
        $review = User::getSingle($id);
        $review->delete();
        return redirect()->route('users');
    }

    // Method to edit a user's profile picture
    public static function editPhoto($id,$name){
        $review = User::getSingle($id);
        $review->picture = $name;
        $review->save();

        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])){
            return view('user.userInfo',$data);
        }
        else{
            return back();
        }
    }
}
