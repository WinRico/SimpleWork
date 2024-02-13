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
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header bg-white py-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <input type="text" name="title" style="width: 50%" placeholder="Введіть короткий опис завдання" class="form-control"><br>
                                <input type="text" name="namedCompany" style="width: 50%" placeholder="Введіть назву компанії замовника, або ПІБ" class="form-control"><br>
                                <textarea name="full_text" rows="10" cols="50" style="width: 100%" placeholder="Введіть повне завдання" class="form-control"></textarea><br>
                                <label for="party">Дедлайн:</label>
                                <input
                                    id="party"
                                    type="datetime-local"
                                    name="deadline"
                                    value="2017-06-01T08:30" />
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Добавити таску</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
