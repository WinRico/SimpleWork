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
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('Line Awesome/css/line-awesome.min.css') }}">

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
                                 class="img-circle elevation-2" alt="avatar 1" style="height: 35px;width: 35px;border-radius: 35px">
                        </button>
                        <div class="sidebar-logo">
                            <a href="{{route('userEditMyProfile')}}"> <span class="ms-2">Адмін</span></a>
                        </div>
                    </div>
        @elseif(Auth::user()->roleId >= 1 && Auth::user()->roleId  < 5 || Auth::user()->roleId == 7 )
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
            @elseif(Auth::user()->roleId  == 6)
                <div class="d-flex">
                    <button class="toggle-btn" type="button">
                        <i class="lni lni-grid-alt"></i>
                    </button>
                    <div class="sidebar-logo">
                        <a href="{{route('freeDashboard')}}">SimpleWork</a>
                    </div>
                </div>
                <div class="d-flex">
                    <button class="toggle-btn" >
                        <img src="{{asset('storage/news/' . Auth::user()->picture)}}"
                             class="rounded-circle" alt="avatar 1" style="width: 35px; border-radius: 1px; border-color: #3b7ddd">
                    </button>
                    <div class="sidebar-logo">
                       <span class="ms-2">{{Auth::user()->firstname . ' ' . Auth::user()->lastname . '  '}}</span>
                    </div>
                </div>
        @endif
                                <ul class="sidebar-nav">
                                    <li class="sidebar-item">
                                        @if(Auth::user()->roleId == 5)
                                        <a href="{{route('dashboard')}}" class="sidebar-link">
                                            <i class="lni lni-home"></i>
                                            <span>Головна</span>
                                        </a>
                                            @elseif(Auth::user()->roleId != 5)
                                                <a href="{{route('memberDashboard')}}" class="sidebar-link">
                                                    <i class="lni lni-home"></i>
                                                    <span>Головна</span>
                                                </a>
                                            @endif
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{route('userEditMyProfile')}}" class="sidebar-link">
                                            <i class="las la-user-circle la-2x"></i>
                                            <span>Мій профіль</span>
                                        </a>
                                    </li>
                                    @if(Auth::user()->roleId == 5)
                                            <li class="sidebar-item">
                                                <a href="{{route('users')}}" class="sidebar-link">
                                                    <i class="lni lni-user"></i>
                                                    <span>Користувачі</span>
                                                </a>
                                            </li>
                                    @endif
                                    @if(Auth::user()->roleId != 5)
                                            <li class="sidebar-item">
                                                <a href="{{route('myTask')}}" class="sidebar-link">
                                                    <i class="lni lni-agenda"></i>
                                                    <span>Мої завдання</span>
                                                </a>
                                            </li>
                                    @endif
                                    <li class="sidebar-item">
                                        <a href="{{route('task')}}" class="sidebar-link">
                                            <i class="lni lni-agenda"></i>
                                            <span>Завдання</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{route('SCRUM')}}" class="sidebar-link">
                                            <i class="lni lni-clipboard"></i>
                                            <span>SCRUM</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="/chat" class="sidebar-link">
                                            <i class="lab la-telegram"></i>
                                            <span>Сповіщення</span>
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


    <div class="container" style="margin-top: 1lh">
        @yield('main_content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{URL::asset('js/script.js') }}" ></script>
<script src="{{URL::asset('js/main.js') }}" ></script>
<script>
    import {VueEditor} from "vue2-editor";
</script>
<script>
    import feather from "feather-icons";

    feather.replace();
</script>
</body>

</html>
