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
        <div class="sidebar-header">
            <a href="/"><img src="/sst.jpg" alt="SSTraders" width="200"></a>
        </div>

        <ul class="list-unstyled components">
            <p><a href="/">DASHBOARD</a></p>
            <li class="accordion" id="accordionExample">

                {{-- Products submenu --}}

{{--                <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#productSubmenu" >Products (Tiles)</a>--}}
{{--                <ul class="{{ Request::path() === 'tiles/productModels' || Request::path() === 'tiles/productModels/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="productSubmenu">--}}
{{--                    <li>--}}
{{--                        <a href="/rawmaterials">Tiles List</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/rawmaterials/create">Add New Tiles</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}

                {{-- Purchases submenu--}}
                <a href="#purchasesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#purchasesSubmenu" >Purchases (Tiles)</a>
                <ul class="{{ Request::path() === 'tiles/materialPurchases' || Request::path() === 'tiles/materialPurchases/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="purchasesSubmenu">
                    <li>
                        <a href="/materialPurchases">Purchase List</a>
                    </li>
                    <li>
                        <a href="/materialPurchases/create">New Purchase</a>
                    </li>
                </ul>

                {{-- Product Types submenu--}}

                <a href="#productTypesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#productTypesSubmenu" >Product Types</a>
                <ul class="{{ Request::path() === 'productTypes' || Request::path() === 'productTypes/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="productTypesSubmenu">
                    <li>
                        <a href="/productTypes">Product Type List</a>
                    </li>
                    <li>
                        <a href="/productTypes/create">New Product Type</a>
                    </li>
                </ul>


                {{-- Stock Item Groups submenu--}}
                <a href="#stockItemGroupsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#stockItemGroupsSubmenu" >Stock Items Group</a>
                <ul class="{{ Request::path() === 'stockItemGroups' || Request::path() === 'stockItemGroups/create' ? 'show ' : ''}} collapse list-unstyled" data-parent="#accordionExample" id="stockItemGroupsSubmenu">
                    <li>
                        <a href="/stockItemGroups">Stock ItemGroup List</a>
                    </li>
                    <li>
                        <a href="/stockItemGroups/create">New Stock ItemGroup</a>
                    </li>
                </ul>



                {{-- Stock Units Groups submenu--}}

                <a href="#stockUnitsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#stockUnitsSubmenu" >Stock Units Groups </a>
                <ul class="{{ Request::path() === 'stockUnits' || Request::path() === 'stockUnits/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="stockUnitsSubmenu">
                    <li>
                        <a href="/stockUnits">Stock Units List</a>
                    </li>
                    <li>
                        <a href="/stockUnits/create">New Stock Unit</a>
                    </li>
                </ul>



                {{-- Tax Categories Groups submenu --}}

{{--                <a href="#taxCategoriesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#taxCategoriesSubmenu" >Tax Categories </a>--}}
{{--                <ul class="{{ Request::path() === 'taxCategories' || Request::path() === 'taxCategories/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="taxCategoriesSubmenu">--}}
{{--                    <li>--}}
{{--                        <a href="/taxCategories">Tax Category List</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/taxCategories/create">New Tax Category</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}


                <a href="#bankSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#bankSubmenu" >Bank Accounts </a>
                <ul class="{{ Request::path() === 'bankAccounts' || Request::path() === 'bankAccounts/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="bankSubmenu">
                    <li>
                        <a href="/banks">Bank Account List</a>
                    </li>
                    <li>
                        <a href="/banks/create">Add New Bank Account</a>
                    </li>
                </ul>


                {{-- LC list submenu --}}

                <a href="#lcSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#lcSubmenu" >LC list </a>
                <ul class="{{ Request::path() === 'tiles/lcs' || Request::path() === 'tiles/lcs/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="lcSubmenu">
                    <li>
                        <a href="/lcs">Lc List</a>
                    </li>
                    <li>
                        <a href="/lcs/create">Add New Lc</a>
                    </li>
                </ul>

                {{-- Currency Convert submenu --}}

                <a href="#currencySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#currencySubmenu" >Currency Convert</a>
                <ul class="{{ Request::path() === 'tiles/currencies' || Request::path() === 'tiles/currencies/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="currencySubmenu">
                    <li>
                        <a href="/currencies">List Of Currencies</a>
                    </li>
                    <li>
                        <a href="/currencies/create">Add New Currency</a>
                    </li>
                </ul>


                {{-- Sales submenu --}}

                <a href="#saleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#saleSubmenu">Sales</a>
                <ul class="{{ Request::path() === 'tiles/sales' || Request::path() === 'tiles/sales/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="saleSubmenu">
                    <li>
                        <a href="/sales">All Sales</a>
                    </li>
                    <li>
                        <a href="/sales/create">New Sales</a>
                    </li>
                </ul>

                <a href="#returnSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#returnSubmenu">Returns</a>
                <ul class="{{ Request::path() === 'tiles/return_products' || Request::path() === 'tiles/return_products/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="returnSubmenu">
                    <li>
                        <a href="/sales_returns">Sale Return List</a>
                    </li>
                    <li>
                        <a href="/sales_returns/create">New Return</a>
                    </li>
                </ul>

                {{-- Suppliers submenu --}}

                <a href="#supplierSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#supplierSubmenu" >Suppliers</a>
                <ul class="{{ Request::path() === 'tiles/suppliers' || Request::path() === 'tiles/suppliers/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="supplierSubmenu">
                    <li>
                        <a href="/suppliers">All Suppliers</a>
                    </li>
                    <li>
                        <a href="/suppliers/create">New Suppliers</a>
                    </li>
                </ul>


                {{-- Customers submenu --}}

                <a href="#customerSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#customerSubmenu" >Customers</a>
                <ul class="{{ Request::path() === 'tiles/customers' || Request::path() === 'tiles/customers/create' ? 'show ' : ''}}collapse list-unstyled" data-parent="#accordionExample" id="customerSubmenu">
                    <li>
                        <a href="/customers">All Customers</a>
                    </li>
                    <li>
                        <a href="/customers/create">New Customer</a>
                    </li>
                </ul>

                <hr style="margin: 0;">

                {{-- Reports submenu --}}

                <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#reportSubmenu" >Reports</a>
                <ul class="{{ Request::path() === 'tiles/sales_report' || Request::path() === 'tiles/purchases_report'|| Request::path() === 'tiles/stock_report'|| Request::path() === 'tiles/customer_reports'|| Request::path() === 'tiles/profit_loss'}}collapse list-unstyled" data-parent="#accordionExample" id="reportSubmenu">
                    <li>
                        <a href="/profit_loss">Profit & Loss</a>
                    </li>
                    <li>
                        <a href="/sales_report">Sales Report</a>
                    </li>
                    <li>
                        <a href="/purchases_report">Purchase</a>
                    </li>
                    <li>
                        <a href="/stock_report">Stock Report</a>
                    </li>
                    <li>
                        <a href="/customer_reports">Customers</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a class="download dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                {{--                <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Log Out</a>--}}
            </li>
            <li>
                <a href="/stone" class="article">Switch to Stone</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
               {{-- <span>Toggle Sidebar</span>--}}
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">

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
                        {{--                        <li class="nav-item">--}}
                        {{--                            <a class="nav-link" href="#">Page</a>--}}
                        {{--                        </li>--}}

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
