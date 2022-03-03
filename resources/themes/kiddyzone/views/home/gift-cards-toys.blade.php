@extends('shop::layouts.master')
@section('full-content-wrapper')
<div class="full-content-wrapper">
    <div class="mainbanner left">
        <div class="top-banner">
            <div class="page-title">
                <h1>Gift Cards Toys Every Month</h1>
                <p>Use Promo Code MTB5 and get 5$ off your first month box when you sign up for a 3,6 or -12month subscription of Mystery Toy Box Classic!</p>
            </div>
            <img src="{{ asset('/themes/kiddyzone/assets/images/banners/subscription-banner.png') }}" alt="listing-banner" class="img-responsive" />
        </div>
    </div>
    <div class="total">
        <!--/******** Main Banner End ********/ -->
        <section id="fun-starts" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-block">
                            <img src="{{ asset('/themes/kiddyzone/assets/images/fun-start.png') }}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-block">
                            <p>Fun Starts Here!</p>
                            <h1>Get Gift Card Now</h1>
                            <p>Our original and most popular classic Mystery Toy Box!</p>
                            <a href="#" class="bg-yellow btn arrow">Shop Now</a>
                        </div>
                    </div>
                </div>    
            </div>
        </section>  
        <section id="gift-cards-products" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="products-grid">
                        <div class="col-md-3">
                            <div class="text-center single-product">
                                <h1>Gift Card</h1>
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/subscription/basic-package.png') }}"/></div>
                                <a class="bg-yellow btn arrow" href="#">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center single-product">
                                <h1>Gift Card</h1>
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/checkout-gift-box.png') }}"/></div>
                                <a class="bg-yellow btn arrow" href="#">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center single-product">
                                <h1>Gift Card</h1>
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/gift-card-pro-3.png') }}"/></div>
                                <a class="bg-yellow btn arrow" href="#">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center single-product">
                                <h1>Gift Card</h1>
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/gift-card-pro-4.png') }}"/></div>
                                <a class="bg-yellow btn arrow" href="#">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center single-product">
                                <h1>Gift Card</h1>
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/gift-card-pro-4.png') }}"/></div>
                                <a class="bg-yellow btn arrow" href="#">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center single-product">
                                <h1>Gift Card</h1>
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/gift-card-pro-5.png') }}"/></div>
                                <a class="bg-yellow btn arrow" href="#">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center single-product">
                                <h1>Gift Card</h1>
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/subscription/basic-package.png') }}"/></div>
                                <a class="bg-yellow btn arrow" href="#">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center single-product">
                                <h1>Gift Card</h1>
                                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/checkout-gift-box.png') }}"/></div>
                                <a class="bg-yellow btn arrow" href="#">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
    </div>    
</div>
@endsection