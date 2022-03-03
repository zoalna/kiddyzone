@extends('shop::layouts.master')

@section('full-content-wrapper')

    <div class="full-content-wrapper">
    <div class="mainbanner left">
  <div class="top-banner">
  	<div class="page-title">
        <h1>Mystery Box</h1>
        <p>Use Promo Code MTB5 and get 5$ off your first month box when you sign up for a 3,6 or -12month subscription of Mystery Toy Box Classic!</p>
      </div>
    <img src="{{ asset('/themes/kiddyzone/assets/images/banners/subscription-banner.png') }}" alt="listing-banner" class="img-responsive" />
  </div>
</div>
    

<div id="partners-discount" class="container-fluid">
    <div class="heading">
        <h2>Our Partners<br> Discount</h2>
    </div>
  <div id="brand_carouse" class="owl-carousel brand-logo">
    <div class="item text-center"> <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/brand/brand1.png') }}" alt="Disney" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/brand/brand2.png') }}" alt="Dell" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/brand/brand3.png') }}" alt="Harley" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/brand/brand4.png') }}" alt="Canon" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/brand/brand5.png') }}" alt="Canon" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/brand/brand6.png') }}" alt="Canon" class="img-responsive" /></a> </div>
    <div class="item text-center"> <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/brand/brand7.png') }}" alt="Canon" class="img-responsive" /></a> </div>
  </div>
</div>   
<section id="how-it-works" class="toys-every-month">
    <div class="container">
        <div class="heading">
            <h2>HERE IS HOW IT WORK</h2>
        </div>
        <div class="rows video">
            <div class="col-md-12">
                <div class="vid-block text-center">
                    <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/video.png') }}"/></a>
                </div>
            </div>
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
<section id="create-account" class="checkout-account bg-yellow">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 left-col">
                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/checkout-gift-box.png') }}"/></div>
            </div>    
            <div class="col-md-6 right-col">
                <div class="text-center content-box">
                    <h2>Get mystery box cards</h2>
                    <p>Our original and most popular classic Mystery Toy Box!</p>
                    <a href="#" class="bg-green btn">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="mystery-box" class="content">
    <div class="container">
            <div class="heading">
                <h2>SUBSCRIBE BY PACKAGES</h2>
            </div>
        <div class="row">
            
                <div class="col-md-4">
                    <div class="text-center single-package first">
                        <div class="img-box"><img src="
                        {{ asset('/themes/kiddyzone/assets/images/subscription/basic-package.png') }}"/></div>
                        <h3>Basic Package</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <h4>£ 60 - £ 80</h4>
                        <a class="bg-green text-white btn select" href="#">Select</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center single-package second">
                        <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/subscription/standard-package.png') }}"/></div>
                        <h3>Standard Package</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <h4>£ 60 - £ 80</h4>
                        <a class="bg-green text-white btn select" href="#">Select</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center single-package third">
                        <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/subscription/premium-package.png') }}"/></div>
                        <h3>Premium Package</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <h4>£ 60 - £ 80</h4>
                        <a class="bg-green text-white btn select" href="#">Select</a>
                    </div>
                </div>   
          </div>
    </div>
</section>
@include('velocity::layouts.cms-page.brows-brand')    
</div>
@endsection

