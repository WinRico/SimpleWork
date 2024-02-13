@extends('layout')

@section('title_name')Головна сторінка@endsection

@section('main_content')
    <?php
use \Illuminate\Support\Facades\Request;
?>
        <div id="page-content">
            <!-- Container fluid -->
            <div class="bg-primary pt-10 pb-21"></div>
            <div class="container-fluid mt-n22 px-6">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page header -->
                        <div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="#" style="margin-bottom: 4px" class="btn btn-sm btn-outline-secondary">Create New Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <h4 class="mb-0">Активні завдання</h4>
                                    </div>
                                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                                        <i class="bi bi-list-task fs-4"></i>
                                    </div>
                                </div>
                                <!-- project number -->
                                <div>
                                    <h1 class="fw-bold" >{{$task->all()->count()}}</h1>
                                    <p class="mb-0" ><span class="text-dark me-2">{{$task->isFinish()}}</span>Виконано</p>
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
                                            $count = 0
                                                ?>
                                           <?php
                                            if($pro->getUserByProject($pro->id)){
                                             $count++;
                                            ?>
                                  <td class="align-middle">
                                      <div class="avatar-group">
                                              <span class="avatar avatar-sm">
                                                 <img alt="avatar"
                                                      src="{{asset('storage/news/' . $users->picture)}}"
                                                      class="rounded-circle">
                                          </span>
                                      </div>
                                  </td>
                                            <?php
                                            }
                                            ?>
                                        @endforeach
                                            <?php
                                        if($count == 0){
                                            ?>
                                            <td class="align-middle">
                                      <div class="avatar-group">
                                              <span class="avatar avatar-sm">
                                                 NULL
                                          </span>
                                      </div>
                                  </td>
                                        <?php
                                        }
                                            ?>
                                  <td class="align-middle text-dark">
                                      <div class="float-start me-3">15%</div>

                                  </td>
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
                <!-- row  -->
                <div class="row my-6">
                    <div class="col-xl-4 col-lg-12 col-md-12 col-12 mb-6 mb-xl-0">
                        <!-- card  -->
                        <div class="card h-100">
                            <!-- card body  -->
                            <div class="card-body">
                                <div class="d-flex align-items-center
                    justify-content-between">
                                    <div>
                                        <h4 class="mb-0">Прогрес виконання завдань </h4>
                                    </div>
                                    <!-- dropdown  -->
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTask" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTask">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- chart  -->
                                <div class="mb-8">
                                    <div id="perfomanceChart"></div>
                                </div>
                                <!-- icon with content  -->
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="text-center" >
                                        <i class="icon-sm text-success" data-feather="check-circle"></i>
                                        <h1 class="mt-3  mb-1 fw-bold" ><text>{{$task->percentProductivity()}}</text>%</h1>
                                        <p>Виконано</p>
                                    </div>
                                    <div class="text-center">
                                        <i class="icon-sm text-warning" data-feather="trending-up"></i>
                                        <h1 class="mt-3  mb-1 fw-bold"><text>{{$task->taskWaiting()}}</text>%</h1>
                                        <p>В очікуванні</p>
                                    </div>
                                    <div class="text-center">
                                        <i class="icon-sm text-warning" data-feather="trending-up"></i>
                                        <h1 class="mt-3  mb-1 fw-bold"><text>{{$task->taskInProgres()}}</text>%</h1>
                                        <p>В процесі</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card  -->
                    <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                        <div class="card h-100">
                            <!-- card header  -->
                            <div class="card-header bg-white py-4">
                                <h4 class="mb-0"> </h4>
                            </div>
                            <!-- table  -->
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Ім'я</th>
                                        <th>Прізвище</th>
                                        <th>Email</th>
                                        <th>Роль</th>
                                        <th>Остання активність</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userAll as $users)
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <img src="assets/images/avatar/avatar-2.jpg" alt="" class="avatar-md avatar rounded-circle">
                                                </div>
                                                <div class="ms-3 lh-1">
                                                    <h5 class=" mb-1"><text >{{$users->firstname}}</text></h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <img src="assets/images/avatar/avatar-2.jpg" alt="" class="avatar-md avatar rounded-circle">
                                                </div>
                                                <div class="ms-3 lh-1">
                                                    <h5 class=" mb-1"><text >{{$users->lastname}}</text></h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle" >{{$users->email}}<p class="mb-0"></p></td>
                                        <td class="align-middle" >{{$users->getRole($users->roleId)}}<p class="mb-0"></p></td>
                                        <td class="align-middle">3 May, 2023</td>
                                        <td class="align-middle">
                                            <div class="dropdown dropstart">
                                                <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-xxs" data-feather="more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else
                                                        here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
