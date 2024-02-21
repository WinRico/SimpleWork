@extends('layout')

@section('title_name')Головна сторінка@endsection

@section('main_content')

<main class="content" style="margin: auto; justify-content: center">
    <div class="container p-0">

        <h1 class="h3 mb-3">SCRUM дошка</h1>

        <div class="row" >
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card card-border-primary">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <div class="dropdown show">
                                <a href="#" data-toggle="dropdown" data-display="static">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h1 class="card-title">В очікуванні</h1>
                    </div>
                    @foreach($taskWait as $task)
                    <div class="card-body p-3">
                        <div class="card mb-3 bg-light">
                            <div class="card-body p-3">
                                <div class="float-right mr-n2">
                                    <label class="custom-control custom-checkbox">
                                        <span class="custom-control-label"></span>
                                    </label>
                                </div>
                                <h5>{{$task->namedCompany}}</h5>
                                <p>{{$task->title}}</p>
                                <div class="float-right mt-n1">
                                    @if(isset($task->user->picture)) <img src="{{asset('storage/news/' . $task->user->picture)}}" width="32" height="32" class="rounded-circle" alt="Avatar">@endif
                                </div>
                                <br><a href="{{url('/info/task/' . $task->id)}}"  class="btn btn-sm btn-outline-secondary">Більше</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card card-border-warning">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <div class="dropdown show">
                                <a href="#" data-toggle="dropdown" data-display="static">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h1 class="card-title">В процесі</h1>
                    </div>
                    @foreach($taskInProgress as $task)
                        <div class="card-body p-3">
                            <div class="card mb-3 bg-light">
                                <div class="card-body p-3">
                                    <div class="float-right mr-n2">
                                        <label class="custom-control custom-checkbox">
                                            <span class="custom-control-label"></span>
                                        </label>
                                    </div>
                                    <h5>{{$task->namedCompany}}</h5>
                                    <p>{{$task->title}}</p>
                                    <div class="float-right mt-n1">
                                        @if(isset($task->user->picture)) <img src="{{asset('storage/news/' . $task->user->picture)}}" width="32" height="32" class="rounded-circle" alt="Avatar">@endif
                                    </div>
                                    <br><a href="{{url('/info/task/' . $task->id)}}"  class="btn btn-sm btn-outline-secondary">Більше</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card card-border-warning">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <div class="dropdown show">
                                <a href="#" data-toggle="dropdown" data-display="static">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h1 class="card-title">Перевірка</h1>
                    </div>
                    @foreach($taskInTest as $task)
                        <div class="card-body p-3">
                            <div class="card mb-3 bg-light">
                                <div class="card-body p-3">
                                    <div class="float-right mr-n2">
                                        <label class="custom-control custom-checkbox">
                                            <span class="custom-control-label"></span>
                                        </label>
                                    </div>
                                    <h5>{{$task->namedCompany}}</h5>
                                    <p>{{$task->title}}</p>
                                    <div class="float-right mt-n1">
                                        @if(isset($task->user->picture)) <img src="{{asset('storage/news/' . $task->user->picture)}}" width="32" height="32" class="rounded-circle" alt="Avatar">@endif
                                    </div>
                                    <br><a href="{{url('/info/task/' . $task->id)}}"  class="btn btn-sm btn-outline-secondary">Більше</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card card-border-success">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <div class="dropdown show">
                                <a href="#" data-toggle="dropdown" data-display="static">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h1 class="card-title">Виконано</h1>
                    </div>
                    @foreach($taskEnd as $task)
                        <div class="card-body p-3">
                            <div class="card mb-3 bg-light">
                                <div class="card-body p-3">
                                    <div class="float-right mr-n2">
                                        <label class="custom-control custom-checkbox">
                                            <span class="custom-control-label"></span>
                                        </label>
                                    </div>
                                    <h5>{{$task->namedCompany}}</h5>
                                    <p>{{$task->title}}</p>
                                    <div class="float-right mt-n1">
                                        @if(isset($task->user->picture)) <img src="{{asset('storage/news/' . $task->user->picture)}}" width="32" height="32" class="rounded-circle" alt="Avatar">@endif
                                    </div>
                                    <br><a href="{{url('/info/task/' . $task->id)}}"  class="btn btn-sm btn-outline-secondary">Більше</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
