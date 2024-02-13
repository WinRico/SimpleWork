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
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <div class="card h-100">
            <!-- card header  -->
            <div class="card-header bg-white py-4">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <form action="{{url("/edit/task/" . $getTask->id)}}" method="post">
                                @csrf
                                <input type="text" name="title" placeholder="Введіть короткий опис завдання" value="{{$getTask->title}}" class="form-control"><br>
                                <input type="text" name="namedCompany" placeholder="Введіть назву компанії замовника, або ПІБ" value="{{$getTask->namedCompany}}" class="form-control"><br>
                                <textarea name="full_text" rows="10" cols="50" style="width: 100%"  class="form-control">{{$getTask->full_text}}</textarea><br>
                                <label for="party">Дедлайн:</label>
                                <input
                                    id="party"
                                    type="datetime-local"
                                    name="deadline"
                                    value="{{$getTask->deadline}}" />
                                <button type="submit"  class="btn btn-sm btn-outline-secondary">Добавити таску</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
