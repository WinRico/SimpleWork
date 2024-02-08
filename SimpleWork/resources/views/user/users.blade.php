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
                        <td class="align-middle"><form method="post" ><button type="button" class="btn btn-sm btn-outline-secondary"><a >Більше</a></button>
                            </form></td>
                        <td class="align-middle"><a href="{{url('/editUser/' . $users->id)}}"  class="btn btn-sm btn-outline-secondary">Редагувати</a>
                            </td>
                        <td class="align-middle"><a href="{{url('/deleteUser/' . $users->id)}}" class="btn btn-sm btn-outline-secondary">Видалити</a>
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
