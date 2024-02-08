<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ URL::asset('css/auth.css') }}" rel="stylesheet" type="text/css">
    <title>Авторизація</title>
</head>
<body>


<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card-body p-5 text-center">
                        <form action="/login" method="post" novalidate>
                        <div class="mb-md-5 mt-md-4 pb-1">
                            @csrf
                            <h2 class="fw-bold mb-2 text-uppercase">Авторизація</h2>
                            <p class="text-white-50 mb-5">Будь ласка введіть свій email і пароль!</p>

                            <div class="form-outline form-white mb-4">
                                <input name="email" type="email" id="typeEmailX"class="form-control form-control-custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autofocus placeholder="Email"/>
                                @error('email')
                                <label class="label-control-custom @error('email') is-invalid @enderror" for="typeEmailX">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input name="password" type="password" id="typePasswordX" class="form-control form-control-custom @error('password') is-invalid @enderror" name="password" placeholder="Password"/>
                                @error('password')
                                <label class="label-control-custom @error('password') is-invalid @enderror" for="typeEmailX">{{ $message }}</label>
                                @enderror
                            </div>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Увійти</button>

                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
