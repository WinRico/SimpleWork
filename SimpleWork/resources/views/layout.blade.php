<?php
    use \Illuminate\Support\Facades\Auth
?>
<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title_name')</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
<div class="wrapper">
        <aside id="sidebar">
        @if(Auth::user()->roleId == 5)
                    <div class="d-flex">
                        <button class="toggle-btn" type="button">
                            <i class="lni lni-grid-alt"></i>
                        </button>
                        <div class="sidebar-logo">
                            <a href="{{route('dashboard')}}">SimpleWork</a>
                        </div>
                    </div>
                    <div class="d-flex">
                        <button class="toggle-btn" type="button">
                            <img src="{{asset('storage/news/' . Auth::user()->picture)}}"
                                 class="rounded-circle me-n2" alt="avatar 1" style="width: 30px;border-radius: 1px; border-color: #3b7ddd">
                        </button>
                        <div class="sidebar-logo">
                            <a href="{{route('userEditMyProfile')}}"> <span class="ms-2">Адмін</span></a>
                        </div>
                    </div>
        @elseif(Auth::user()->roleId >= 1 && Auth::user()->roleId  < 5)
                                <div class="d-flex">
                                    <button class="toggle-btn" type="button">
                                        <i class="lni lni-grid-alt"></i>
                                    </button>
                                    <div class="sidebar-logo">
                                        <a href="{{route('memberDashboard')}}">SimpleWork</a>
                                    </div>
                                </div>
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <img src="{{asset('storage/news/' . Auth::user()->picture)}}"
                         class="rounded-circle" alt="avatar 1" style="width: 35px; border-radius: 1px; border-color: #3b7ddd">
                </button>
                <div class="sidebar-logo">
                    <a href="{{route('userEditMyProfile')}}"> <span class="ms-2">{{Auth::user()->firstname . ' ' . Auth::user()->lastname . '  '}}</span></a>
                </div>
            </div>
        @endif
                                <ul class="sidebar-nav">
                                    <li class="sidebar-item">
                                        <a href="/" class="sidebar-link">
                                            <i class="lni lni-home"></i>
                                            <span>Головна</span>
                                        </a>
                                    </li>
                                    @if(Auth::user()->roleId == 5)
                                        <ul class="sidebar-nav">
                                            <li class="sidebar-item">
                                                <a href="{{route('users')}}" class="sidebar-link">
                                                    <i class="lni lni-user"></i>
                                                    <span>Користувачі</span>
                                                </a>
                                            </li>
                                        </ul>
                                    @endif
                                    <li class="sidebar-item">
                                        <a href="task" class="sidebar-link">
                                            <i class="lni lni-agenda"></i>
                                            <span>Завдання</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="sidebar-footer">
                                    <a href="{{route('logout')}}" class="sidebar-link">
                                        <i class="lni lni-exit"></i>
                                        <span>Вихід</span>
                                    </a>
                                </div>
        </aside>


    <div class="main p-3">
        @yield('main_content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="{{URL::asset('js/script.js') }}" ></script>
<script>
    import {VueEditor} from "vue2-editor";
</script>

</body>

</html>
