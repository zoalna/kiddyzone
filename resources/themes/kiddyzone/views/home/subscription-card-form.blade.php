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
    <!--/******** Main Banner End ********/ -->
    <section id="mystery-box" class="content subsc-card">
        <div class="container">
            <div class="heading">
                <h2>SUBSCRIBE BY PACKAGES</h2>
            </div>
            <div class="rows">
                <div class="account-info subsc-form">
                    <div class="col-md-12">
                        <h2>Account Information :-</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="form_name" type="text" placeholder="First Name" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="form_name" type="text" placeholder="Last Name" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="form_name" type="email" placeholder="Email Address" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="form_name" type="text" placeholder="Language Preference" class="form-control" required="">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="address-info subsc-form">
                    <div class="col-md-12">
                        <h2>Address Information :-</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="form_name" type="text" placeholder="Street Adress 1" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="form_name" type="text" placeholder="Street Adress 2" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="form_name" type="text" placeholder="City" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="form_name" type="text" placeholder="Province" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="form_name" type="text" placeholder="Postol code" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="form_name" type="tel" placeholder="Phone Number" class="form-control" required="">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="container children-birth subsc-form">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="title-content">
                        <h2>CHILDREN’S BIRTHDAYS<span>(OPTIONAL)</span></h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="form-group"> 
                            <input type="checkbox" id="register-birthday">
                            <label for="register-birthday">I would like to register Birthdays with Toy”R”Us</label>
                        </div>    
                        </div>    
                    </div>
                    <div class="col-md-6"></div>
                    </div>    
                    <div class="row birthday-form">
                        <div class="col-md-6">
                        <div class="form-group first-name">
                        <input id="form_name" type="text" placeholder="First Name" class="form-control" required="">
                        </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                            <select>
                                <option value="0">Janruary</option>
                                <option value="1">February</option>
                                <option value="2">March</option>
                                <option value="3">April</option>
                                <option value="4">May</option>
                                <option value="5">June</option>
                                <option value="6">July</option>
                                <option value="7">August</option>
                                <option value="8">September</option>
                                <option value="9">October</option>
                                <option value="10">November</option>
                                <option value="11">December</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <select>
                                <option value="">Month & Year of Birth</option>
                                <option value="0">2015</option>
                                <option value="1">2016</option>
                                <option value="2">2017</option>
                                <option value="3">2018</option>
                                <option value="4">2019</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="btn-area">
                            <a class="add-child" href="#">Add Another Child</a>
                            <a class="remove" href="#">Remove</a>
                        </div>
                        </div>    
                    </div>    
                    <div class="col-md-6"></div> 
                </div>
            </div>
        </div>
    </section> 
    </div>
@endsection