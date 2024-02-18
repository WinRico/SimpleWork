@extends('layout')

@section('title_name')Головна сторінка@endsection

@section('main_content')
    <div id="page-content">
        <!-- Container fluid -->
        <div class="bg-primary pt-10 pb-21"></div>
        <div class="container-fluid mt-n22 px-6">
            <div class="row">

                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <!-- card -->
                    <div class="card " >
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center
                    mb-3">
                                <div>
                                    <h4 class="mb-0">Проекти</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold" >{{$project->all()->count()}}</h1>
                                <p class="mb-0"><span class="text-dark me-2" >{{$project->isFinish()}}</span>Виконано</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <!-- card -->
                    <div class="card ">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center
                    mb-3">
                                <div>
                                    <h4 class="mb-0">Мої завдання</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                                    <i class="bi bi-list-task fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold" >{{$task->all()->where('userId',Auth::user()->id)->count()}}</h1>
                                <p class="mb-0" ><span class="text-dark me-2">{{$task->UserTaskIsFinish(Auth::user()->id)}}</span>Виконано</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <!-- card -->
                    <div class="card ">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center
                    mb-3">
                                <div>
                                    <h4 class="mb-0">Працівники</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                                    <i class="bi bi-people fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{$user->count()}}</h1>
                                <p class="mb-0"><span class="text-dark me-2">_</span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <!-- card -->
                    <div class="card ">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center
                    mb-3">
                                <div>
                                    <h4 class="mb-0">Продуктивність</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                                    <i class="bi bi-bullseye fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">0%</h1>
                                <p class="mb-0"><span class="text-success me-2">{{$project->percentProductivity()}}%</span>Виконано</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row  -->
            <div class="row mt-6">
                <div class="col-md-12 col-12">
                    <!-- card  -->
                    <div class="card">
                        <!-- card header  -->
                        <div class="card-header bg-white  py-4">
                            <h4 class="mb-0">Активні Проекти</h4>

                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" value="{{Request::get('name')}}" name="name" required placeholder="Назва">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-sm btn-outline-secondary" type="submit">Пошук</button>
                                        <a href="{{route('dashboard')}}" class="btn btn-sm btn-outline-secondary">Очистити</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- table  -->
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Назва проекту</th>
                                    <th>Термін</th>
                                    <th>Пріоритет</th>
                                    <th>Виконавці</th>
                                    <th>Прогрес</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projectAll as $pro)
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex
                            align-items-center">
                                                <div>
                                                    <div class="icon-shape icon-md border p-4
                                rounded-1" >
                                                        <img src="assets/images/brand/dropbox-logo.svg" alt="">
                                                    </div>
                                                </div>
                                                <div class="ms-3 lh-1" >
                                                    <h5 class=" mb-1"> <a href="#" class="text-inherit" >{{$pro->name}}</a></h5>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">{{$pro->hour}}</td>
                                            <?php
                                            $check = $pro->priority;
                                            $bool = false;
                                        if ($check == "Середній"){
                                            ?>
                                        <td class="align-middle"><span class="badge
                                             bg-warning">{{$pro->priority}}</span></td>
                                            <?php
                                        }
                                        if ($check == "Високий"){
                                            ?>
                                        <td class="align-middle" ><span class="badge
                                             bg-danger">{{$pro->priority}}</span></td>
                                            <?php
                                        }
                                        if ($check == "Легкий"){
                                            ?>
                                        <td class="align-middle"><span class="badge
                                             bg-info ">{{$pro->priority}}</span></td>
                                            <?php
                                        }
                                            ?>

                                        <td class="align-middle">
                                            <div class="avatar-group">
                                                @if(isset($pro->task))
                                                    @foreach($pro->task as $task)
                                                        @if(isset($task->user))

                                                            <span class="avatar avatar-sm">
                                                 <img alt="avatar"
                                                      src="{{asset('storage/news/' . $task->user->picture)}}"
                                                      class="rounded-circle" alt="avatar 1" style="width: 35px; border-radius: 1px; border-color: #3b7ddd">
                                          </span>
                                                        @endif
                                                    @endforeach

                                                @endif
                                            </div>
                                        </td>
                                        @if(isset($pro->task))
                                            <td class="align-middle text-dark">
                                                <div class="float-start me-3">{{$task->percentOfProjectProductivity($pro->id)}}%</div>

                                            </td>
                                        @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- card footer  -->
                        <?php
                        if ($projectAll->count() <= 3){
                            ?>
                        <div class="pagination">
                            {!! $projectAll->links() !!}
                        </div>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
@endsection
