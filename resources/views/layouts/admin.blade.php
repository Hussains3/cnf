<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" media='screen,print'>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" media='screen,print'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous" />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
<div class="wrapper">

    <!-- Sidebar  -->

    <nav id="sidebar">
        <div class="sidebar-header d-flex justify-content-center">
            <img src="{{asset('images/app_logo.png')}}" alt="C&F" width="70">
            {{-- <h1 class="text-center">C&F</h1>
            <img src="" alt="" width="50px"> --}}
        </div>

        <ul class="list-unstyled components">
            <p><a href="/">DASHBOARD</a></p>
            <li class="accordion" id="accordionExample">

                <hr style="margin: 0;">
                {{-- agents submenu --}}
                <a href="#agentSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#agentSubmenu" >Agents</a>
                <ul class="{{ Request::path() === 'agents' || Request::path() === 'agents/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="agentSubmenu">
                    <li>
                        <a href="/agents">All Agents</a>
                    </li>
                    <li>
                        <a href="/agents/create">New Agent</a>
                    </li>
                </ul>

                <hr style="margin: 0;">
                {{-- agents submenu --}}
                <a href="#ieSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#ieSubmenu" >Importer / Exporter</a>
                <ul class="{{ Request::path() === 'ie_datas' || Request::path() === 'ie_datas/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="ieSubmenu">
                    <li>
                        <a href="/ie_datas">Importer/Exporter List</a>
                    </li>
                    <li>
                        <a href="/ie_datas/create">New Importer/Exporter</a>
                    </li>
                </ul>


                <hr style="margin: 0;">

                @role('receiver|operator|deliver')
                {{-- datas submenu --}}
                <a href="#dataSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"  >File Datas</a>
                <ul class="{{ Request::path() === 'file_edit' || Request::path() === 'file_list' || Request::path() === 'file_datas' || Request::path() === 'file_datas/create' ? 'show ' : ''}}collapse list-unstyled"  id="dataSubmenu">
                    @role('admin|receiver')
                        <li>
                            <a href="/file_datas/create">File Receive</a>
                        </li>
                    @endrole

                    <li>
                        <a href="/file_datas">
                            @role('admin')
                                List Data
                            @endrole
                            @role('receiver|operator')
                                Received Data
                            @endrole
                            @role('deliver')
                                Operated Data
                            @endrole
                        </a>
                    </li>

                    @role('admin|operator|deliver')
                        <li>
                            <a href="/file_list">Edit Datas</a>
                        </li>
                    @endrole
                </ul>

                @endrole
                @role('admin')
                {{-- user submenu --}}
                <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"  >User</a>
                <ul class="{{ Request::path() === 'user' || Request::path() === 'user_adde' ? 'show ' : ''}}collapse list-unstyled"  id="userSubmenu">
                    <li>
                        <a href="{{route('users.index')}}">Users List</a>
                    </li>
                    <li>
                        <a href="{{route('users.create')}}">Add User</a>
                    </li>
                    <li>
                        <a href="{{route('salary.create')}}">Add Salary</a>
                    </li>
                </ul>

                @endrole

                <hr style="margin: 0;">

                {{-- Reports submenu --}}

                <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#reportSubmenu">Reports</a>
                <ul class="{{ Request::path() === 'data_entry' ||  Request::path() === 'export_report' || Request::path() === 'import_report' || Request::path() === 'goods_report' ||Request::path() === 'daily_report' || Request::path() === 'daily_summary' || Request::path() === 'deliver_report' || Request::path() === 'operator_report'|| Request::path() === 'receiver_report'}}collapse list-unstyled" data-parent="#accordionExample" id="reportSubmenu">
                    <li>
                        <a href="/daily_summary">Daily Summary Report</a>
                    </li>
                    <li>
                        <a href="/daily_report">Daily Report</a>
                    </li>
                    <li>
                        <a href="/receiver_report">Receiver Report</a>
                    </li>
                    <li>
                        <a href="/import_report">Delivery Report (import)</a>
                    </li>
                    <li>
                        <a href="/export_report">Delivery Report (Export)</a>
                    </li>
                    <li class="d-none">
                        <a href="/operator_report">Operator Report</a>
                    </li>

                    <li>
                        <a href="/data_entry">Data Entry Report</a>
                    </li>

                    <li>
                        <a href="/monthly_final_report">Monthly Final Report</a>
                    </li>
                    <li>
                        <a href="/goods_report">Assessment Report Per Day</a>
                    </li>

                </ul>
                <hr style="margin: 0;">
                <a href="/support">Support</a>
            </li>
        </ul>
        <ul class="list-unstyled CTAs">
            <li>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>

        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-between text-center">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
                {{-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button> --}}
                <h1 class="text-uppercase w-75 text-primary">Benapole customs c&F agents association</h1>

                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                    <ul class="nav navbar-nav">

                        <li class="nav-item active">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="content-main" style="min-height: calc(100vh - 165px);">
            @include('flash::message')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="page-footer font-small" style="background: #e9ecef">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 ">© 2020 Copyright:
                <a href="http://softxltd.com/"> SoftxLtd.com</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->


    </div>
</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

{{--bootstrap JS--}}
<script src="{{ asset('js/admin.js') }}" ></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.7.1/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2_op').select2();
        });
    </script>

    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>

    @yield('scripts')
</body>

</html>
