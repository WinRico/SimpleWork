@extends('layout')

@section('title_name')Мої завдання@endsection

@section('main_content')
    <?php
    use \Illuminate\Support\Facades\Auth;
    ?>

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
                            <div class="form-group col-md-3">
                                <button class="btn btn-sm btn-outline-secondary" type="submit">Пошук</button>
                                <a href="{{route('task')}}" class="btn btn-sm btn-outline-secondary">Очистити</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <p class="mb-0" >Кількість завдань: {{$task->count()}}</p>
                    </div>
                </div>
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
                            <td class="align-middle" ><p class="mb-0" >{{$el->project->priority}}</p></td>
                            <td class="align-middle"><p class="mb-0">{{$el->project->hour}}</p></td>
                            <td class="align-middle"><p class="mb-0" >{{$el->category->name}}</p></td>
                            <td class="align-middle"><button type="button" class="btn btn-sm btn-outline-secondary"><a >Більше</a></button>
                            </td>
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
