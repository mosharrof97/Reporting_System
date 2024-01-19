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

    <link href="{{ asset('vendor/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/chartist/css/chartist.min.css') }}" rel="stylesheet">
    {{-- -- Datatable -- --}}
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Reporting System </title>
</head>

<body>

    {{-- --*******************
        Preloader start
    ********************-- --}}
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    {{-- --*******************
        Preloader end
    ********************-- --}}


    {{-- --**********************************
        Main wrapper start
    ***********************************-- --}}
    <div id="main-wrapper">

        {{-- --**********************************
            Nav header start
        ***********************************-- --}}
        <div class="nav-header bg-white">
            <a href="{{ route('adminDashboard') }}" class="brand-logo">
                {{-- <img class="logo-abbr" style="max-width: 52px;" src="{{ asset('images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt=""> --}}
                <img class="brand-title  " style="max-width:100px" src="{{ asset('images/logo-text.png') }}"
                    alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        {{-- --**********************************
            Nav header end
        ***********************************-- --}}

        {{-- --**********************************
            Header start
        ***********************************-- --}}
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa-solid fa-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="fa-solid fa-user"></i> </span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>

                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">Log
                                            out</a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        {{-- --**********************************
            Header end ti-comment-alt
        ***********************************-- --}}

        {{-- --**********************************
            Sidebar start
        ***********************************-- --}}
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">

                    <li class="nav-label first">Main Menu</li>

                    <li>
                        <a class="has-arrow" href="{{ route('adminDashboard') }}" aria-expanded="false">
                            <i class="fa-solid fa-gauge"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="{{ route('employee_List') }}" aria-expanded="false">
                            <i class="fa-solid fa-store"></i>
                            <span class="nav-text">Employee List</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="{{ route('schedule_list') }}" aria-expanded="false">
                            <i class="fa-solid fa-store"></i>
                            <span class="nav-text">Appointmen List</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="{{ route('marketing_Report') }}" aria-expanded="false">
                            <i class="fa-solid fa-store"></i>
                            <span class="nav-text">Marketing Report</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="fa-solid fa-store"></i>
                            <span class="nav-text">TA & DA Bill</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="##" aria-expanded="false">
                            <i class="fa-solid fa-store"></i>
                            <span class="nav-text">Manage Role </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="javascript:void(0);" class="has-arrow d-flex menu-toggle">
                            <i class="fa-solid fa-store"></i>
                            <div data-i18n="Account Settings">Address Manage</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('createDistrict') }}" class="menu-link">
                                    <div data-i18n="Account">District</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('createUpazila') }}" class="menu-link">
                                    <div data-i18n="Notifications">Upazila</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        {{-- --**********************************
            Sidebar end
        ***********************************-- --}}

        {{-- --**********************************
            Content body start
        ***********************************-- --}}
        {{-- <div class="content-body"> --}}
        <div class="content-body">
            <div class="container-fluid">

                @yield('content')

            </div>
        </div>
        {{-- --**********************************
            Content body end
        ***********************************-- --}}


        {{-- --**********************************
            Footer start
        ***********************************-- --}}
        <div class="footer">
            <div class="copyright">
                <p>Copyright © 2024. &amp; Developed by <a href="#" target="_blank">Teamx Technologies</a> </p>
            </div>
        </div>
        {{-- --**********************************
            Footer end
        ***********************************-- --}}
    </div>
    {{-- --**********************************
        Main wrapper end
    ***********************************-- --}}

    {{-- --**********************************
        Scripts
    ***********************************-- --}}
    {{-- -- Required vendors -- --}}
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>

    <script src="{{ asset('vendor/chartist/js/chartist.min.js') }}"></script>

    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/pg-calendar/js/pignose.calendar.min.js') }}"></script>

    <script src="{{ asset('js/dashboard/dashboard-2.js') }}"></script>
    {{-- -- Circle progress -- --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    {{-- -- Datatable -- --}}
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

</body>

</html>
