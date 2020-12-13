@extends('layouts.admin')

@section('content')
    <link href="{{ asset('css/db.css') }}" rel="stylesheet">

    <div class="jumbotron">
        <div class="row w-100 d-none">
            <div class="col-md-3">
                <div class="card border-info mx-sm-1 p-3">
                    <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-car" aria-hidden="true"></span></div>
                    <div class="text-info text-center mt-3"><h4>Today's Import</h4></div>
                    <div class="text-info text-center mt-2">
                        <h1>100</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success mx-sm-1 p-3">
                    <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                    <div class="text-success text-center mt-3"><h4>Today's Export</h4></div>
                    <div class="text-success text-center mt-2">
                        <h1>1500</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-info mx-sm-1 p-3">
                    <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-car" aria-hidden="true"></span></div>
                    <div class="text-info text-center mt-3"><h4>Today's Delivery</h4></div>
                    <div class="text-info text-center mt-2">
                         <h1>1800</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success mx-sm-1 p-3">
                    <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                    <div class="text-success text-center mt-3"><h4>Today's Total</h4></div>
                    <div class="text-success text-center mt-2">
                        <h1>4000</h1>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mr-4">

        <div class="row w-100">
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/file_datas">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color:  rgba(51, 105, 232, 0.1)">
                            <i class="fas fa-list" style="color:#3369e8"></i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Files
                                <div class="pull-right badge" id="WrGridSystem"></div></h4>
                        </div>

                    </a>
                </div>
            </div>
            @role('receiver')

            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/file_datas/create">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color: rgba(22, 160, 133, 0.1)">
                            <i class = "fas fa-cart-arrow-down" style="color:#16A085"></i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>New File
                                <div class="pull-right badge" id="WrControls"></div></h4>
                        </div>
                    </a>
                </div>
            </div>
            @endrole
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/ie_datas">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color:  rgba(51, 105, 232, 0.1)">
                            <i class="fas fa-shopping-bag" style="color:#3369e8"> </i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Import / Export
                                <div class="pull-right badge" id="WrGridSystem"></div></h4>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/agents">
                        <div class="wrimagecard-topimage_header text-center fsi" style="background-color: rgba(22, 160, 133, 0.1)">
                            <i class = "fas fa-users" style="color:#16A085"></i>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Agents
                                <div class="pull-right badge" id="WrControls"></div>
                            </h4>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection
