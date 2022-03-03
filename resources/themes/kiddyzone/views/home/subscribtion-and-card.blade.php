@extends('shop::layouts.master')

@section('full-content-wrapper')
    <div class="full-content-wrapper">
        <div class="mainbanner left">
            <div class="top-banner">
                <div class="page-title">
                    <h1>Subscribtion and Card</h1>
                    <p>Use Promo Code MTB5 and get 5$ off your first month box when you sign up for a 3,6 or -12month subscription of Mystery Toy Box Classic!</p>
                </div>
                <img src="{{ asset('/themes/kiddyzone/assets/images/banners/subscription-banner.png') }}" alt="listing-banner" class="img-responsive" />
            </div>
        </div>
        <div class="total">
            <section id="how-it-works">
                <div class="container">
                    <div class="heading">
                        <h2>HERE IS HOW IT WORK</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center step one">
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/subscription/basic-package.png') }}"/></div>
                                <h3>Mystery Box</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center step two">
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/subscription/standard-package.png') }}"/></div>
                                <h3>Mystery Box</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center step three">
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/subscription/premium-package.png') }}"/></div>
                                <h3>Mystery Box</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>   
                    </div>
                </div>
            </section>   
            <section id="mystery-box" class="content subsc-card">
                <div class="container">
                    <div class="heading">
                        <h2>SUBSCRIBE BY PACKAGES</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <div class="text-center single-package first">
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/subscription/basic-package.png') }}"/></div>
                                <h3>Basic Package</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <h4>£ 60 - £ 80</h4>
                                <a class="bg-green text-white btn select" href="#">Select</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center single-package last">
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/subscription/premium-package.png') }}"/></div>
                                <h3>Premium Package</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <h4>£ 60 - £ 80</h4>
                                <a class="bg-green text-white btn select" href="#">Select</a>
                            </div>
                        </div> 
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </section>    
            <section id="create-account" class="get-subscription-cards" style="background:#79CF73">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-md-6 left-col">
                            <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/subscription-bell-card.png') }}"/></div>
                        </div>    
                        <div class="col-md-6 right-col">
                            <div class="text-center content-box">
                                <h2>Get subscription cards</h2>
                                <p>Our original and most popular classic Mystery Toy Box!</p>
                                <a href="#" class="bg-yellow text-black btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            <section id="subsc-newsletter" class="our-newsletter">
                <div class="container">
                    <div class="row d-flex">    
                        <div class="col-md-6 right-col">
                            <div class="text-center content-box">
                                <h2>Subscribe To Our Newsletter</h2>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</p>
                                <a href="#" class="bg-yellow text-black btn">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-md-6 left-col">
                            <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/laptop-with-cup.png') }}"/></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection