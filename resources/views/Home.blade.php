<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    {{-- -- Favicon icon -- --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <title>Reporting System</title>
</head>

<body>

    <div class="container-fluid "
        style=" background-color: #c9c9c9; background-image:url({{ asset('images/background-1.png') }}); background-size: cover;  background-position: center; background-repeat: no-repeat; ">
        <div class="row flex-column justify-content-center align-items-center vh-100">
            <button type="button" class="btn btn-primary py-2 m-2 col-xl-2 col-sm-3 col-4 " data-bs-toggle="modal"
                data-bs-target="#adminModal">Admin</button>
            <button type="button" class="btn btn-primary py-2 m-2 col-xl-2 col-sm-3 col-4 " data-bs-toggle="modal"
                data-bs-target="#employeeModal">Employee</button>

        </div>


        {{-- Login Form --}}

        {{-- Admin login Modal --}}
        <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="adminModalLabel">Admin Log in</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center ">
                            <img class="w-50" src="{{ asset('images/logo-text.png') }}" alt="">
                        </div>
                        {{-- <div class="alert " role="alert">
                            {{ session('status') }}
                        </div> --}}

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="label-control">Email </label>
                                <input type="email" id="email" class="form-control" name="email" required
                                    autofocus autocomplete="username">

                                @error('email')
                                    <span id="" class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="label-control">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required
                                    autofocus autocomplete="current-password">

                                @error('password')
                                    <span id="" class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-check text-start mb-3">
                                <input class="form-check-input" type="checkbox" value="remember-me"
                                    id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>

                            {{-- <div class="flex items-end justify-end mt-4"> --}}
                            <div class="text-end">
                                @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}"> Forgot your password? </a>
                                @endif

                                <button class="ms-3 btn btn-dark">Log in</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- admin login Modal --}}


        {{-- Employee login Modal --}}
        <div class="modal fade " id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="adminModalLabel">Employee Log in</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center ">
                            <img class="w-50" src="{{ asset('images/logo-text.png') }}" alt="">
                        </div>
                        {{-- <div class="alert " role="alert">
                            {{ session('status') }}
                        </div> --}}

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="label-control">Email </label>
                                <input type="email" id="email" class="form-control" name="email" required
                                    autofocus autocomplete="username">

                                @error('email')
                                    <span id="" class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="label-control">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required
                                    autofocus autocomplete="current-password">

                                @error('password')
                                    <span id="" class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-check text-start mb-3">
                                <input class="form-check-input" type="checkbox" value="remember-me"
                                    id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>

                            {{-- <div class="flex items-end justify-end mt-4"> --}}
                            <div class="text-end">
                                @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}"> Forgot your password?
                                    </a>
                                @endif

                                <button class="ms-3 btn btn-dark">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Employee login Modal --}}

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
