@extends('layout')

@section('title_name')Редагувати Користувача@endsection

@section('main_content')
    <h1>Редагувати Користувача</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action={{url("/editUser/" . $getRecord->id)}} method="post" novalidate>
        @csrf
        <input type="text" name="firstname" placeholder="Ім'я" value="{{$getRecord->firstname}}" class="form-control"><br>
        <input type="text" name="lastname" placeholder="Прізвище" value="{{$getRecord->lastname}}" class="form-control"><br>
        <input type="email" name="email" placeholder="Email" value="{{$getRecord->email}}" class="form-control"><br>
        <input type="password" name="password" placeholder="Пароль"value="{{$getRecord->password}}"  class="form-control"><br>
        <input type="text" name="role" placeholder="Роль" class="form-control"><br>
        <button type="submit" class="btn btn-sm btn-outline-secondary">Редагувати користувача</button>
    </form>
@endsection
