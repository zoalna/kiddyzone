@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.login-form.page-title') }}
@endsection

@section('content-wrapper')
    <div class="mainbanner left">
        <div class="top-banner">
            <div class="page-title">
                <h1>Sign In</h1>
            </div>
            <img src="{{ asset('/themes/kiddyzone/assets/images/banners/listing.png') }}" alt="listing-banner" class="img-responsive" />
        </div>
    </div>
    <div class="auth-content form-container">

        {!! view_render_event('bagisto.shop.customers.login.before') !!}
        <section id="sign-in" class="content account">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 img-col bg-blue text-center" style="background:#02b0ed">
                        <img src="{{ asset('/themes/kiddyzone/assets/images/login-logo.png') }}">
                    </div>
                    <div class="col-md-7 sign-form" style="background:#EEEEEE">
                        <div class="body col-12">
                            <div class="form-header">
                                <h3 class="fw6">
                                    Login Now !
                                </h3>

                                <p class="fs16">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div>

                            <form
                                method="POST"
                                action="{{ route('customer.session.create') }}"
                                @submit.prevent="onSubmit">

                                {{ csrf_field() }}

                                

                                <div class="form-group" :class="[errors.has('email') ? 'has-error' : '']">
                                    <!-- <label for="email" class="mandatory label-style">
                                        {{ __('shop::app.customer.login-form.email') }}
                                    </label> -->

                                    <input
                                        type="text"
                                        class="form-style"
                                        placeholder="Email Address"
                                        name="email"
                                        value="{{ old('email') }}"
                                        data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;" />

                                    <span class="control-error" v-if="errors.has('email')" v-text="errors.first('email')"></span>
                                </div>

                                <div class="form-group" :class="[errors.has('password') ? 'has-error' : '']">
                                    <!-- <label for="password" class="mandatory label-style">
                                        {{ __('shop::app.customer.login-form.password') }}
                                    </label> -->

                                    <input
                                        type="password"
                                        class="form-style"
                                        name="password"
                                        placeholder="Password"
                                        value="{{ old('password') }}"
                                        data-vv-as="&quot;{{ __('shop::app.customer.login-form.password') }}&quot;" />

                                    <span class="control-error" v-if="errors.has('password')" v-text="errors.first('password')"></span>

                                    <a href="{{ route('customer.forgot-password.create') }}" class="float-right">
                                        {{ __('shop::app.customer.login-form.forgot_pass') }}
                                    </a>

                                    <div class="mt10">
                                        @if (Cookie::has('enable-resend'))
                                            @if (Cookie::get('enable-resend') == true)
                                                <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">

                                    {!! Captcha::render() !!}

                                </div>
                                
                                {!! view_render_event('bagisto.shop.customers.login_form_controls.after') !!}
                                <div class="button-login row">
                                    <div class="submit-button col-md-5">
                                        <input class="theme-btn submit" type="submit" value="Login">
                                    </div>
                                    <div class="headings col-md-7">
                                        <div class="sing-headding">
                                            <h5>Create An Account </h5>
                                        </div>
                                        <div class="sing-up">
                                            <a href="{{ route('customer.register.index') }}" class="btn-new-customer">
                                                <button type="button" class="theme-btn light">
                                                    {{ __('velocity::app.customer.login-form.sign-up')}}
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group social-media">
                                    <span>Login With :-</span>
                                    <div class="icons">
                                    {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {!! view_render_event('bagisto.shop.customers.login.after') !!}
    </div>
@endsection

@push('scripts')

{!! Captcha::renderJS() !!}

@endpush