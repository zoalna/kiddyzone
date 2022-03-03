@extends('shop::layouts.master')

@section('full-content-wrapper')
    <div class="full-content-wrapper">
        <div class="mainbanner left">
        <div class="top-banner">
            <div class="page-title">
                <h1>loyalty program terms & info</h1>
                <p>Use Promo Code MTB5 and get 5$ off your first month box when you sign up for a 3,6 or -12month subscription of Mystery Toy Box Classic!</p>
            </div>
            <img src="{{ asset('/themes/kiddyzone/assets/images/banners/subscription-banner.png') }}" alt="listing-banner" class="img-responsive" />
        </div>
        </div>
        <!--/******** Main Banner End ********/ -->
        <div class="total">
            <section id="join-the-club">
                <div class="container">
                    <div class="heading">
                        <h2>Join the club</h2>
                    </div>
                    <div class="rows">
                        <div class="text-center content-block">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                            <div class="row">
                                <div class="col-md-2"></div>    
                                <div class="col-md-4">
                                    <div class="list">
                                        <img src="{{ asset('/themes/kiddyzone/assets/images/star.png') }}"/>
                                        <p>Lorem ipsum dolor sit amet, consetetur</p>
                                    </div>
                                    <div class="list">
                                        <img src="{{ asset('/themes/kiddyzone/assets/images/star.png') }}"/>
                                        <p>Lorem ipsum dolor sit amet, consetetur</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="list">
                                        <img src="{{ asset('/themes/kiddyzone/assets/images/star.png') }}"/>
                                        <p>Lorem ipsum dolor sit amet, consetetur</p>
                                    </div>
                                    <div class="list">
                                        <img src="{{ asset('/themes/kiddyzone/assets/images/star.png') }}"/>
                                        <p>Lorem ipsum dolor sit amet, consetetur</p>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="join-club-btn"><a class="btn text-white bg-red" href="#">Sign Up</a></div>
                            </div>                
                        </div>    
                    </div>
                </div>
            </section>    
            <section class="join-club-video">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="vid-block text-center">
                                <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/video.png') }}"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="newslatters">
        @include('velocity::layouts.cms-page.newslatter')
    </div>
@endsection