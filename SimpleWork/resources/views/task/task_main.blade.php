@extends('layout')

@section('title_name')Завдання@endsection

@section('main_content')
    <div>
        <a href="task/add" style="margin-bottom: 4px" class="btn btn-sm btn-outline-secondary">Додати завдання</a>
    </div>
    <!-- table  -->
    <div class="table-responsive">
        <table class="table text-nowrap">
            <thead class="table-light">
            <tr>
                <th>Назва</th>
                <th>Пріоритет</th>
                <th>Дедлайн</th>
                <th>Тип</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($task as $el)
            <tr>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="assets/images/avatar/avatar-2.jpg" alt="" class="avatar-md avatar rounded-circle">
                        </div>
                        <div class="ms-3 lh-1">
                            <h5 class=" mb-1">{{$el->title}}</h5>
                        </div>
                    </div>
                </td>
                <td class="align-middle" ><p class="mb-0" >{{$el->getPriority($el->projectId)}}</p></td>
                <td class="align-middle"><p class="mb-0">{{$el->getDeadLine($el->projectId)}}</p></td>
                <td class="align-middle"><p class="mb-0" >{{$el->getCategory($el->categoryId)}}</p></td>
                <td class="align-middle"><button type="button" class="btn btn-sm btn-outline-secondary"><a >Більше</a></button>
                </td>
                <td class="align-middle"><a href="{{url('/edit/task/' . $el->id)}}"  class="btn btn-sm btn-outline-secondary">Редагувати</a>
                </td>
                <td class="align-middle"><a href="{{url('/delete/task/' . $el->id)}}" class="btn btn-sm btn-outline-secondary">Видалити</a>
            </tr>
            @endforeach
            </tbody>
        </table>


@endsection
