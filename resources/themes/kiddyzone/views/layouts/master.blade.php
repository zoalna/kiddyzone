<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        {{-- title --}}
        <title>@yield('page_title')</title>

        {{-- meta data --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url()->to('/') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('/themes/kiddyzone/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/themes/kiddyzone/assets/css/new.css') }}">
        <link rel="stylesheet" href="{{ asset('/themes/kiddyzone/assets/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('/themes/kiddyzone/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/themes/kiddyzone/assets/css/owl.carousel.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">  
        <!-- <script src="{{ asset('/themes/kiddyzone/assets/js/template_js/jstree.min.js') }}"></script>
        <script src="{{ asset('/themes/kiddyzone/assets/js/template_js/template.js') }}"></script>
        <script src="{{ asset('/themes/kiddyzone/assets/js/common.js') }}"></script> -->
       
        <script src="{{ asset('/themes/kiddyzone/assets/js/jquery-2.1.1.min.js') }}"></script>
        <script src="{{ asset('/themes/kiddyzone/assets/js/owl.carousel.min.js') }}"></script>
        <!-- <script src="{{ asset('/themes/kiddyzone/assets/js/jquery.parallax.js') }}"></script> -->
        <script src="{{ asset('/themes/kiddyzone/assets/js/global.js') }}"></script>

  
        {!! view_render_event('bagisto.shop.layout.head') !!}

        {{-- for extra head data --}}
        @yield('head')

        {{-- seo meta data --}}
        @yield('seo')

        {{-- fav icon --}}
        @if ($favicon = core()->getCurrentChannel()->favicon_url)
            <link rel="icon" sizes="16x16" href="{{ $favicon }}" />
        @else
            <link rel="icon" sizes="16x16" href="{{ asset('/themes/kiddyzone/assets/images/static/v-icon.png') }}" />
        @endif

        {{-- all styles --}}
        @include('shop::layouts.styles')
    </head>

    <body @if (core()->getCurrentLocale() && core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif>
        {!! view_render_event('bagisto.shop.layout.body.before') !!}

        {{-- main app --}}
        <div id="app">
            <product-quick-view v-if="$root.quickView"></product-quick-view>

            <div class="main-container-wrapper">

                @section('body-header')
                    {{-- top nav which contains currency, locale and login header --}}
                    @include('shop::layouts.top-nav.index')

                    {!! view_render_event('bagisto.shop.layout.header.before') !!}

                        {{-- primary header after top nav --}}
                        @include('shop::layouts.header.index')

                    {!! view_render_event('bagisto.shop.layout.header.after') !!}

                    <div class="main-content-wrapper col-12 no-padding">

                        {{-- secondary header --}}
                        <header class="row velocity-divide-page vc-header header-shadow active">

                        @include('velocity::layouts.header.custome-header')

                        </header>

                        <div class="">
                            <div class="row col-12 remove-padding-margin">
                                <sidebar-component
                                    main-sidebar=true
                                    id="sidebar-level-0"
                                    url="{{ url()->to('/') }}"
                                    category-count="{{ $velocityMetaData ? $velocityMetaData->sidebar_category_count : 10 }}"
                                    add-class="category-list-container pt10">
                                </sidebar-component>

                                <div class="col-12 no-padding content" id="home-right-bar-container">
                                    <div class="container-right row no-margin col-12 no-padding">
                                        {!! view_render_event('bagisto.shop.layout.content.before') !!}

                                            @yield('content-wrapper')

                                        {!! view_render_event('bagisto.shop.layout.content.after') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @show
                
                <div class="container">
                    {!! view_render_event('bagisto.shop.layout.full-content.before') !!}

                        @yield('full-content-wrapper')

                    {!! view_render_event('bagisto.shop.layout.full-content.after') !!}
                </div>
            </div>

            {{-- overlay loader --}}
            <velocity-overlay-loader></velocity-overlay-loader>
        </div>

        {{-- footer --}}
        @section('footer')
            {!! view_render_event('bagisto.shop.layout.footer.before') !!}

                @include('shop::layouts.footer.index')

            {!! view_render_event('bagisto.shop.layout.footer.after') !!}
        @show

        {!! view_render_event('bagisto.shop.layout.body.after') !!}

        {{-- alert container --}}
        <div id="alert-container"></div>

        {{-- all scripts --}}
        @include('shop::layouts.scripts')
    </body>
</html>
