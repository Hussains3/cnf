@extends('layouts.admin')
@section('title', 'category List')

@section('content')

    <!-- desktop -->
    <section class="">
        <div class="container">
            <h1 class="h1 text-center ">Support</h1>

            <div class="row mt-5 mb-2">
                <!-- support image-->
                <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                    <img src="/images/support.svg" alt="" srcset="" class=".img-fluid">
                </div>

                <!-- original tape of tail -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-2  address_con">
                    <ul class="address mt-5 pt-5">
                        <li class="list-group-item"><h2 class="">Softx Technology Ltd.</h2></li>
                        <li class="list-group-item"><i class="fas fa-link"></i> www.softxltd.com</li>
                        <li class="list-group-item"><i class="fas fa-at"></i> contact@softxltd.com</li>
                        <li class="list-group-item"><i class="fas fa-map-marker"></i> 5th Flore, SHSTP, Jashore,Bangladesh</li>
                    </ul>
                </div>
            </div>
    </section>


    <!-- video section -->
    <section class="pb-5">
        <div class="container pb-cmnt-container">
            <h4 class="text-center my-2 text-white">Tutorial Videos</h4>

            <!-- video -->
            <div class="row mt-5">
                <div class="embed-responsive embed-responsive-16by9 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </section>

@endsection
