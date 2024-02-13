@extends('layout')

@section('title_name')Завдання@endsection

@section('main_content')
    <?php
    use \Illuminate\Support\Facades\Auth;
        ?>
    <div>
        <a href="task/add" style="margin-bottom: 4px" class="btn btn-sm btn-outline-secondary">Додати завдання</a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <div class="card h-100">
            <!-- card header  -->
            <div class="card-header bg-white py-4">
                <form method="get" action="">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <input type="text" class="form-control" value="{{Request::get('name')}}" name="name"  placeholder="Назва">
                            </div>
                            <!--<div class="form-group col-md-2">
                                <input type="text" class="form-control" value="{{Request::get('lastname')}}" name="lastname"  placeholder="Прізвище">
                            </div>-->
                            <div class="form-group col-md-3">
                                <button class="btn btn-sm btn-outline-secondary" type="submit">Пошук</button>
                                <a href="{{route('task')}}" class="btn btn-sm btn-outline-secondary">Очистити</a>
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
                <th>Назва</th>
                <th>Пріоритет</th>
                <th>Дедлайн</th>
                <th>Роль</th>
                <th></th>
                @if(Auth::user()->roleId == 5)
                <th></th>
                <th></th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($task as $el)
            <tr>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
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
                @if(Auth::user()->roleId == 5)
                <td class="align-middle"><a href="{{url('/edit/task/' . $el->id)}}"  class="btn btn-sm btn-outline-secondary">Редагувати</a>
                </td>
                <td class="align-middle"><a href="{{url('/delete/task/' . $el->id)}}" class="btn btn-sm btn-outline-secondary">Видалити</a>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
        <?php
        if ($task->count() <= 5){
            ?>
        <div class="pagination">
            {!! $task->links() !!}
        </div>
            <?php
        }
        ?>
        </div>
    </div>
</div>

@endsection
