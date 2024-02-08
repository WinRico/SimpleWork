@extends('layout')

@section('title_name')Редагування завдання@endsection

@section('main_content')
    <h1>Редагування завдання</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url("/edit/task/" . $getTask->id)}}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Введіть короткий опис завдання" value="{{$getTask->title}}" class="form-control"><br>
        <input type="text" name="namedCompany" placeholder="Введіть назву компанії замовника, або ПІБ" value="{{$getTask->namedCompany}}" class="form-control"><br>
        <input name="full_text" placeholder="Введіть повне завдання" value="{{$getTask->full_text}}" class="form-control"><br>
        <label for="party">Дедлайн:</label>
        <input
            id="party"
            type="datetime-local"
            name="deadline"
            value="{{$getTask->deadline}}" />
        <button type="submit"  class="btn btn-sm btn-outline-secondary">Добавити таску</button>
    </form>
@endsection
