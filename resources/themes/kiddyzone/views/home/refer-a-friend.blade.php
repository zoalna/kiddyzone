@extends('shop::layouts.master')

@section('full-content-wrapper')

    <div class="full-content-wrapper">
    <div class="mainbanner left">
  <div class="top-banner">
  	<div class="page-title">
        <h1>Refer a friend </h1>
        <p>Use Promo Code MTB5 and get 5$ off your first month box when you sign up for a 3,6 or -12month subscription of Mystery Toy Box Classic!</p>
      </div>
    <img src="{{ asset('/themes/kiddyzone/assets/images/banners/subscription-banner.png') }}" alt="listing-banner" class="img-responsive" />
  </div>
</div>
 
<section id="create-account" class="checkout-account bg-yellow">
    <div class="container">
    <div class="container sing-up  content account">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-md-5 img-col bg-pink text-center">
                        <img src="http://206.189.138.26/themes/kiddyzone/assets/images/login-logo.png">
                    </div>
                    <div class="body col-md-7 sign-form" style="background:#EEEEEE">
                        <h2 class="fw6">
                            Refer a frient
                        </h2>

                        <p class="fs16">
                            If you are new to our store, we glad to have you as member.
                        </p>

                        <script>
                            function validateForm() {
                                let first_name = document.forms["myForm"]["first_name"].value;
                                let last_name = document.forms["myForm"]["last_name"].value;
                                let friend_email = document.forms["myForm"]["friend_email"].value;

                                if (first_name == "") {  alert("Please enter first name"); return false; }
                                else if (last_name == "") {  alert("Please enter last name"); return false; }
                                else if (friend_email == "") {  alert("Please enter friend email"); return false; }
                            }
                        </script>

                        <form method="post"  action="" name="myForm" onsubmit="return validateForm()" >
 
                            <div class="controls-input row">
                                <div class="control-group col-md-6" >                                    
                                    <input type="text" class="form-style"  name="first_name"  placeholder="First Name" value="" require />                                   
                                </div>
                                
                                <div class="control-group col-md-6" >                                   
                                    <input  type="text" class="form-style" name="last_name"  placeholder="Last Name"  value="" require />                                   
                                </div>
                                
                            </div>

							<div class="controls-input row">
                                <div class="control-group col-md-12">                                
                                    <input  type="email" class="form-style" name="friend_email" placeholder="Friend Email Address" value="" require />                                
                                </div>                            
                            </div>
                          
                        
                           <div class="create-ac row">
                               <div class="create-button col-md-6">
                                    <button class="theme-btn" type="submit"> Submit  </button>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                               </div>                                 
                            </div>   

                        </form>
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
 
@include('velocity::layouts.cms-page.brows-brand')    
</div>
@endsection

