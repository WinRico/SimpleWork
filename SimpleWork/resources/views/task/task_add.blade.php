@extends('layout')

@section('title_name')Добавлення завдання@endsection

@section('main_content')
    <h1>Добавлення завдання</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/task/add" method="post">
        @csrf
        <input type="text" name="title" placeholder="Введіть короткий опис завдання" class="form-control"><br>
        <input type="text" name="namedCompany" placeholder="Введіть назву компанії замовника, або ПІБ" class="form-control"><br>
        <textarea name="full_text" placeholder="Введіть повне завдання" class="form-control"></textarea><br>
        <label for="party">Дедлайн:</label>
        <input
            id="party"
            type="datetime-local"
            name="deadline"
            value="2017-06-01T08:30" />
        <button type="submit" class="btn btn-sm btn-outline-secondary">Добавити таску</button>
    </form>
@endsection
