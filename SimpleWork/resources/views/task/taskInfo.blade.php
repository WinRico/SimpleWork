@extends('layout')

@section('title_name')Редагування завдання@endsection

@section('main_content')
    <h1>Опис завдання</h1>

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
                            <form action="{{url("/edit/task/" . $infoTask->id)}}" method="post">
                                @csrf
                                <p >{{$infoTask->title}}</p>
                                <p >Замовник: {{$infoTask->namedCompany}}</p>
                                <p ><textarea name="full_text" rows="10" cols="50" style="width: 100%"  class="disabled">{{$infoTask->full_text}}</textarea></p>
                                <p type="datetime-local">Дедлайн: {{$infoTask->project->hour}}</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
