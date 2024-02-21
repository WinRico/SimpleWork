@extends('layout')

@section('title_name')Користувачі@endsection

@section('main_content')
    <div>
        <a href="{{route('addUser')}}" style="margin-bottom: 4px" class="btn btn-sm btn-outline-secondary">Додати користувача</a>
    </div>
<!-- card  -->
<div class="col-xl-12 col-lg-12 col-md-12 col-12">
    <div class="card h-100">
        <!-- card header  -->
        <div class="card-header bg-white py-4">
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" value="{{Request::get('firstname')}}" name="firstname"  placeholder="Ім'я">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" value="{{Request::get('lastname')}}" name="lastname"  placeholder="Прізвище">
                        </div>
                        <div class="form-group col-md-3">
                            <button class="btn btn-sm btn-outline-secondary" type="submit">Пошук</button>
                            <a href="{{route('users')}}" class="btn btn-sm btn-outline-secondary">Очистити</a>
                        </div>
                    </div>
                </div>
            </form>

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
                    <th></th>
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
                        <td class="align-middle" >{{$users->role->role}}<p class="mb-0"></p></td>
                        <td class="align-middle">3 May, 2023</td>
                        <td class="align-middle"><a href="{{url('/infoUser/' . $users->id)}}"  class="btn btn-sm btn-outline-secondary">Більше</a>
                        </td>
                        <td class="align-middle"><a href="{{url('/editUser/' . $users->id)}}"  class="btn btn-sm btn-outline-secondary">Редагувати</a>
                            </td>
                        <td class="align-middle"><a href="{{url('/deleteUser/' . $users->id)}}" class="btn btn-sm btn-outline-secondary">Видалити</a>
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <?php
            if ($userAll->count() <= 10){
                ?>
            <div class="pagination">
                {!! $userAll->links() !!}
            </div>
                <?php
            }
            ?>
        </div>
    </div>
@endsection
