@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection

@section('content-wrapper')
    <div class="auth-content form-container">
        <div class="mainbanner left">
            <div class="top-banner">
                <div class="page-title">
                    <p>Get 10 points free when you subscribe</p>
                    <h1>Sign Up</h1>
                    <div class="refer-friend"><a href="{{ url('/refer-a-friend') }}" class="btn bg-yellow text-white">Refer a friend</a> </div>
                </div>
                <img src="{{ asset('/themes/kiddyzone/assets/images/banners/signup-banner.jpg') }}" alt="listing-banner" class="img-responsive" />
            </div>
        </div>
        <div class="container sing-up  content account">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-md-5 img-col bg-pink text-center">
                        <img src="{{ asset('/themes/kiddyzone/assets/images/login-logo.png') }}">
                    </div>
                    <div class="body col-md-7 sign-form" style="background:#EEEEEE">
                        <h2 class="fw6">
                            Sign UP Here !
                        </h2>

                        <p class="fs16">
                            {{ __('velocity::app.customer.signup-form.form-sginup-text')}}
                        </p>

                        {!! view_render_event('bagisto.shop.customers.signup.before') !!}

                        <form
                            method="post"
                            action="{{ route('customer.register.create') }}"
                            @submit.prevent="onSubmit">

                            {{ csrf_field() }}

                            {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}
                            <div class="controls-input row">
                                <div class="control-group col-md-6" :class="[errors.has('first_name') ? 'has-error' : '']">
                                    <!-- <label for="first_name" class="required label-style">
                                        {{ __('shop::app.customer.signup-form.firstname') }}
                                    </label> -->

                                    <input
                                        type="text"
                                        class="form-style"
                                        name="first_name"
                                        placeholder="First Name"
                                        v-validate="'required'"
                                        value="{{ old('first_name') }}"
                                        data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;" />

                                    <span class="control-error" v-if="errors.has('first_name')" v-text="errors.first('first_name')"></span>
                                </div>

                                {!! view_render_event('bagisto.shop.customers.signup_form_controls.firstname.after') !!}

                                <div class="control-group col-md-6" :class="[errors.has('last_name') ? 'has-error' : '']">
                                    <!-- <label for="last_name" class="required label-style">
                                        {{ __('shop::app.customer.signup-form.lastname') }}
                                    </label> -->

                                    <input
                                        type="text"
                                        class="form-style"
                                        name="last_name"
                                        placeholder="Last Name"
                                        v-validate="'required'"
                                        value="{{ old('last_name') }}"
                                        data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;" />

                                    <span class="control-error" v-if="errors.has('last_name')" v-text="errors.first('last_name')"></span>
                                </div>

                                {!! view_render_event('bagisto.shop.customers.signup_form_controls.lastname.after') !!}
                            </div>
							<div class="controls-input row">
                            <div class="control-group col-md-12" :class="[errors.has('email') ? 'has-error' : '']">
                                <!-- <label for="email" class="required label-style">
                                    {{ __('shop::app.customer.signup-form.email') }}
                                </label> -->

                                <input
                                    type="email"
                                    class="form-style"
                                    name="email"
                                    placeholder="Email Address"
                                    v-validate="'required|email'"
                                    value="{{ old('email') }}"
                                    data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;" />

                                <span class="control-error" v-if="errors.has('email')" v-text="errors.first('email')"></span>
                            </div>

                            {!! view_render_event('bagisto.shop.customers.signup_form_controls.email.after') !!}
                            </div>
                            <div class="controls-input row">
                                <div class="control-group col-md-6" :class="[errors.has('password') ? 'has-error' : '']">
                                    <!-- <label for="password" class="required label-style">
                                        {{ __('shop::app.customer.signup-form.password') }}
                                    </label> -->

                                    <input
                                        type="password"
                                        class="form-style"
                                        placeholder="Password"
                                        name="password"
                                        v-validate="'required|min:6'"
                                        ref="password"
                                        value="{{ old('password') }}"
                                        data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;" />

                                    <span class="control-error" v-if="errors.has('password')" v-text="errors.first('password')"></span>
                                </div>

                                {!! view_render_event('bagisto.shop.customers.signup_form_controls.password.after') !!}

                                <div class="control-group col-md-6" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                                    <!-- <label for="password_confirmation" class="required label-style">
                                        {{ __('shop::app.customer.signup-form.confirm_pass') }}
                                    </label> -->

                                    <input
                                        type="password"
                                        class="form-style"
                                        placeholder="Confirm Password"
                                        name="password_confirmation"
                                        v-validate="'required|min:6|confirmed:password'"
                                        data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;" />

                                    <span class="control-error" v-if="errors.has('password_confirmation')" v-text="errors.first('password_confirmation')"></span>
                                </div>

                                {!! view_render_event('bagisto.shop.customers.signup_form_controls.password_confirmation.after') !!}
                            </div>
                            <div class="control-group">

                                {!! Captcha::render() !!}

                            </div>
                           <div class="create-ac row">
                               <div class="create-button col-md-6">
                                    @if (core()->getConfigData('customer.settings.newsletter.subscription'))
                                        <div class="control-group">
                                            <!-- <input type="checkbox" id="checkbox2" name="is_subscribed">
                                            <span>{{ __('shop::app.customer.signup-form.subscribe-to-newsletter') }}</span> -->
                                        </div>
                                    @endif

                                    {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}

                                    <button class="theme-btn" type="submit">
                                    Create Account
                                    </button>
                               </div>
                                <div class="headings col-md-6">
                                    <div class="account-link">
                                        <p>Already Have An Account</p>
                                    </div>
                                    <a href="{{ route('customer.session.index') }}" class="btn-new-customer">
                                        <button type="button" class="theme-btns light bg-login">
                                            {{ __('velocity::app.customer.signup-form.login')}}
                                        </button>
                                    </a>
                                </div>
                            </div>     
                        </form>
                        <div class="controls-input row">
                        <div class="col-md-12">
                            <div class="form-group checkbox">
                                <input type="checkbox" id="html">
                                <label for="html">Yes, I understand and agree to <a href="#" class="text-green">kiddy Zone Terms of service,</a> incliding the <a href="#" class="text-green">user agreement</a> and <a href="#" class="text-green">privacy policy</a></label>
                            </div>         
                        </div>
                        {!! view_render_event('bagisto.shop.customers.signup.after') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

{!! Captcha::renderJS() !!}

@endpush