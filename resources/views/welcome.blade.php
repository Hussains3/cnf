@extends('layouts.admin')

@section('content')
    <link href="{{ asset('css/db.css') }}" rel="stylesheet">

    <div class="jumbotron">
        <div class="row w-100">
            <div class="col-md-3">
                <div class="card border-info mx-sm-1 p-3">
                    <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-car" aria-hidden="true"></span></div>
                    <div class="text-info text-center mt-3"><h4>Total Buy</h4></div>
                    <div class="text-info text-center mt-2">
{{--                        <h1>{{$total_buy}}</h1>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success mx-sm-1 p-3">
                    <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                    <div class="text-success text-center mt-3"><h4>Total Sales</h4></div>
                    <div class="text-success text-center mt-2">
{{--                        <h1>{{$sales_total}}</h1>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-info mx-sm-1 p-3">
                    <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-car" aria-hidden="true"></span></div>
                    <div class="text-info text-center mt-3"><h4>Total Paid</h4></div>
                    <div class="text-info text-center mt-2">
{{--                        <h1>{{$total_paid}}</h1>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success mx-sm-1 p-3">
                    <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                    <div class="text-success text-center mt-3"><h4>Total Due</h4></div>
                    <div class="text-success text-center mt-2">
{{--                        <h1>{{$total_due}}</h1>--}}
                    </div>
                </div>
            </div>
        </div>

        <hr class="mr-4">

        <div class="row w-100">
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/sales">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color:  rgba(51, 105, 232, 0.1)">
                            <i class="fas fa-list" style="color:#3369e8"></i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Sales List
                                <div class="pull-right badge" id="WrGridSystem"></div></h4>
                        </div>

                    </a>
                </div>
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/sales/create">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color: rgba(22, 160, 133, 0.1)">
                            <i class = "fas fa-cart-arrow-down" style="color:#16A085"></i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>New Sale
                                <div class="pull-right badge" id="WrControls"></div></h4>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    @if(session()->get('template') == 'Stone')
                        <a href="/materialPurchases">
                            @else
                                <a href="/rawpurchases">
                                    @endif
                                    <div class="wrimagecard-topimage_header text-center fsi" style="background-color:  rgba(51, 105, 232, 0.1)">
                                        <i class="fas fa-shopping-bag" style="color:#3369e8"> </i>
                                    </div>
                                    <div class="wrimagecard-topimage_title">
                                        <h4>Purchases
                                            <div class="pull-right badge" id="WrGridSystem"></div></h4>
                                    </div>
                                </a>
                </div>
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/customers">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color: rgba(22, 160, 133, 0.1)">
                            <i class = "fas fa-users" style="color:#16A085"></i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Customers
                                <div class="pull-right badge" id="WrControls"></div>
                            </h4>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>



@endsection
