@extends('layout')

@section('title_name')Добавити Користувача@endsection

@section('main_content')
    <h1>Добавити Користувача</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/addUser" method="post" novalidate>
        @csrf
        <input type="text" name="firstname" placeholder="Ім'я" class="form-control"><br>
        <input type="text" name="lastname" placeholder="Прізвище" class="form-control"><br>
        <input type="email" name="email" placeholder="Email" class="form-control"><br>
        <input type="password" name="password" placeholder="Пароль" class="form-control"><br>
        <input type="text" name="role" placeholder="Роль" class="form-control"><br>
        <button type="submit" class="btn btn-sm btn-outline-secondary">Добавити користувача</button>
    </form>
@endsection
