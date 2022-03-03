@extends('shop::layouts.master')

@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('customHelper', 'Webkul\Velocity\Helpers\Helper')

@php
    $total = $reviewHelper->getTotalReviews($product);
    
    $avgRatings = $reviewHelper->getAverageRating($product);
    $avgStarRating = round($avgRatings);

    $productImages = [];
    $images = productimage()->getGalleryImages($product);

    foreach ($images as $key => $image) {
        array_push($productImages, $image['medium_image_url']);
    }
@endphp

@section('page_title')
    {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
@stop

@section('seo')
    <meta name="description" content="{{ trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}"/>

    <meta name="keywords" content="{{ $product->meta_keywords }}"/>

    @if (core()->getConfigData('catalog.rich_snippets.products.enable'))
        <script type="application/ld+json">
            {!! app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product) !!}
        </script>
    @endif

    <?php $productBaseImage = productimage()->getProductBaseImage($product, $images); ?>

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:title" content="{{ $product->name }}" />

    <meta name="twitter:description" content="{{ $product->description }}" />

    <meta name="twitter:image:alt" content="" />

    <meta name="twitter:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:type" content="og:product" />

    <meta property="og:title" content="{{ $product->name }}" />

    <meta property="og:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:description" content="{{ $product->description }}" />

    <meta property="og:url" content="{{ route('shop.productOrCategory.index', $product->url_key) }}" />
@stop

@push('css')
    <style type="text/css">
        .related-products {
            width: 100%;
        }

        .recently-viewed {
            margin-top: 20px;
        }

        .store-meta-images > .recently-viewed:first-child {
            margin-top: 0px;
        }

        .main-content-wrapper {
            margin-bottom: 0px;
        }

        .buynow {
            height: 40px;
            text-transform: uppercase;
        }
    </style>
@endpush

@section('content-wrapper')
    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}
        <div class="row no-margin">
            <section class="col-12 product-detail">
                <div class="mainbanner">
                    <div class="top-banner">
                        <div class="page-title">
                            <h1>Product Detail</h1>
                        </div>
                            <img src="{{ asset('/themes/kiddyzone/assets/images/banners/pdetail.png') }}" alt="listing-banner" class="img-responsive">
                    </div>
                </div>
                <div class="total">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a class="home" href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/shop') }}">Shop</a></li>
                            <li class="active"><a href="{{ route('shop.productOrCategory.index', $product->url_key) }}">{{ $product->name }}</a></li>
                        </ol>
                    </div>
                </div>
                <div class="layouter {{$product->type}} {{! $product->haveSufficientQuantity(1) ? '' : 'active' }} disable-box-shadow">
                    <product-view>
                        <div class="form-container">
                            @csrf()

                            <input type="hidden" text="{{ $product->getkeyType() }}" name="product_id" value="{{ $product->product_id }}">

                            <div class="row">
                                {{-- product-gallery --}}
                                <div class="left col-lg-6 col-md-6">
                                    @include ('shop::products.view.gallery')
                                </div>

                                {{-- right-section --}}
                                <div class="right col-lg-6 col-md-6">
                                    {{-- product-info-section --}}
                                    <div class="row info">
                                        <h2 class="col-12">  {{ $product->name }}</h2>
                                        <div class="prod-row">
                                            <div class="price">
                                                @include ('shop::products.price', ['product' => $product])

                                                @if (Webkul\Tax\Helpers\Tax::isTaxInclusive() && $product->getTypeInstance()->getTaxCategory())
                                                    <span>
                                                        {{ __('velocity::app.products.tax-inclusive') }}
                                                    </span>
                                                @endif
                                            </div>
                                            @if ($total)
                                                <div class="reviews">
                                                    <star-ratings
                                                        push-class="mr5"
                                                        :ratings="{{ $avgStarRating }}"
                                                    ></star-ratings>

                                                    <div class="reviews">
                                                        <span>
                                                            {{ __('shop::app.reviews.ratingreviews', [
                                                                'rating' => $avgRatings,
                                                                'review' => $total])
                                                            }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="instock">
                                                @include ('shop::products.view.stock', ['product' => $product])
                                            </div>
                                        </div>
                                        @if (count($product->getTypeInstance()->getCustomerGroupPricingOffers()) > 0)
                                            <div class="col-12">
                                                @foreach ($product->getTypeInstance()->getCustomerGroupPricingOffers() as $offers)
                                                    {{ $offers }} </br>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="wthatsapp">
                                            <p class="point-text">If you're buying this product you will be getting 5.4 this many points</p>
                                            <div class="buy-from-whatsapp">
                                                <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/buy-whatsapp.svg') }}"/> Buy From Whatsapp
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 23.4 15.8" xml:space="preserve">
                                                <path id="XMLID_3_" class="st0" d="M14.6,1.3c-0.4,0.4-0.4,0.9,0,1.3l4.3,4.3H2.6c-0.5,0-0.9,0.4-0.9,0.9s0.4,0.9,0.9,0.9h16.3
                                                L14.6,13c-0.4,0.4-0.3,0.9,0,1.3c0.4,0.4,0.9,0.4,1.3,0l5.8-5.8c0.1-0.1,0.1-0.2,0.2-0.3c0-0.1,0.1-0.2,0.1-0.4
                                                c0-0.2-0.1-0.5-0.3-0.6l-5.8-5.8C15.5,0.9,14.9,0.9,14.6,1.3"/>
                                                <path id="XMLID_2_" class="st1" d="M14.6,1.3c-0.4,0.4-0.4,0.9,0,1.3l4.3,4.3H2.6c-0.5,0-0.9,0.4-0.9,0.9s0.4,0.9,0.9,0.9h16.3
                                                L14.6,13c-0.4,0.4-0.3,0.9,0,1.3c0.4,0.4,0.9,0.4,1.3,0l5.8-5.8c0.1-0.1,0.1-0.2,0.2-0.3c0-0.1,0.1-0.2,0.1-0.4
                                                c0-0.2-0.1-0.5-0.3-0.6l-5.8-5.8C15.5,0.9,14.9,0.9,14.6,1.3z"/>
                                                </svg>
                                                </a>    
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
                                    {!! view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]) !!}

                                    @if ($product->getTypeInstance()->showQuantityBox())
                                        <div class="quenty-boder">
                                            <quantity-changer quantity-text="{{ __('shop::app.products.quantity') }}"></quantity-changer>
                                        </div>
                                    @else
                                        <input type="hidden" name="quantity" value="1">
                                    @endif
                                    <div class="total-attributes">
                                        {!! view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]) !!}

                                        @include ('shop::products.view.configurable-options')

                                        @include ('shop::products.view.downloadable')

                                        @include ('shop::products.view.grouped-products')

                                        @include ('shop::products.view.bundle-options')

                                        <div class="button-atributes">
                                        <div class="product-actions">
                                            @if (core()->getConfigData('catalog.products.storefront.buy_now_button_display'))
                                                @include ('shop::products.buy-now', [
                                                    'product' => $product,
                                                ])
                                            @endif

                                            @include ('shop::products.add-to-cart', [
                                                'form' => false,
                                                'product' => $product,
                                                'showCartIcon' => false,
                                                'showCompare' => core()->getConfigData('general.content.shop.compare_option') == "1"
                                                                ? true : false,
                                            ])
                                        </div>
                                        <div class="product-actions">
                                                @include ('shop::products.buy-now', [
                                                    'product' => $product,
                                                ])
                                        </div>
                                        </div>
                                        <!-- @include ('shop::products.view.attributes', [
                                            'active' => true
                                        ]) -->
                                    </div>
                                    
                                    {{-- product long description --}}
                                    @include ('velocity::products.view.shipping')
                                    <!-- @include ('velocity::products.view.product-policy')
                                    @include ('velocity::products.view.product-payment') -->
                                    

                                </div>
                            </div>
                        </div>
                    </product-view>
                </div>
            </section>
            <!-- @include('velocity::products.custom-ratingd') -->
            <section class="description-total">
                <div class="description">
                    {!! view_render_event('bagisto.shop.products.view.short_description.before', ['product' => $product]) !!}
                        @include ('shop::products.view.description', ['accordian' => true])
                    {!! view_render_event('bagisto.shop.products.view.short_description.after', ['product' => $product]) !!}
                </div>
            </section>
            <section class="review-product-details">
                <div class="all-rating-top">
                    <div class="all-rating-count">
                        <span class="fs16 display-block">
                            {{ __('shop::app.reviews.ratingreviews', [
                                'rating' => $avgRatings,
                                'review' => $total])
                            }}
                        </span>
                    </div>
                    <hr>
                </div>
                
                <div class="review-width row col-12">
                    @include ('shop::products.view.custom-review', ['accordian' => false])
                </div>
            </section>
            
            <div class="related-products product-details">
                <!-- @include('shop::products.view.related-products')
                @include('shop::products.view.up-sells') -->
                @if (count(app('Webkul\Velocity\Helpers\Helper')->getHotSellersProducts()))
                    <section class="featured-products hot">

                        <div class="featured-heading heading">
                            <h2> Top Products</h2>
                        </div>
                        <div class="product-grid-4">
                            <div class="productbg row">

                            @foreach (app('Webkul\Velocity\Helpers\Helper')->getHotSellersProducts() as $productFlat)

                                @if (core()->getConfigData('catalog.products.homepage.out_of_stock_items'))
                                    @include ('shop::products.list.card', ['product' => $productFlat])
                                @else
                                    @if ($productFlat->isSaleable())
                                        @include ('shop::products.list.card', ['product' => $productFlat])
                                    @endif
                                @endif

                            @endforeach
                            </div>
                        </div>

                    </section>
                @endif
            </div>
            @include('velocity::products.related-content-view')
        </div>
    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>

    <script type="text/javascript" src="{{ asset('themes/velocity/assets/js/jquery.ez-plus.js') }}"></script>

    <script type='text/javascript' src='https://unpkg.com/spritespin@4.1.0/release/spritespin.js'></script>

    <script type="text/x-template" id="product-view-template">
        <form
            method="POST"
            id="product-form"
            @click="onSubmit($event)"
            action="{{ route('cart.add', $product->product_id) }}">

            <input type="hidden" name="is_buy_now" v-model="is_buy_now">

            <slot v-if="slot"></slot>

            <div v-else>
                <div class="spritespin"></div>
            </div>

        </form>
    </script>

    <script>
        Vue.component('product-view', {
            inject: ['$validator'],
            template: '#product-view-template',
            data: function () {
                return {
                    slot: true,
                    is_buy_now: 0,
                }
            },

            mounted: function () {
                let currentProductId = '{{ $product->url_key }}';
                let existingViewed = window.localStorage.getItem('recentlyViewed');

                if (! existingViewed) {
                    existingViewed = [];
                } else {
                    existingViewed = JSON.parse(existingViewed);
                }

                if (existingViewed.indexOf(currentProductId) == -1) {
                    existingViewed.push(currentProductId);

                    if (existingViewed.length > 3)
                        existingViewed = existingViewed.slice(Math.max(existingViewed.length - 4, 1));

                    window.localStorage.setItem('recentlyViewed', JSON.stringify(existingViewed));
                } else {
                    var uniqueNames = [];

                    $.each(existingViewed, function(i, el){
                        if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
                    });

                    uniqueNames.push(currentProductId);

                    uniqueNames.splice(uniqueNames.indexOf(currentProductId), 1);

                    window.localStorage.setItem('recentlyViewed', JSON.stringify(uniqueNames));
                }
            },

            methods: {
                onSubmit: function(event) {
                    if (event.target.getAttribute('type') != 'submit')
                        return;

                    event.preventDefault();

                    this.$validator.validateAll().then(result => {
                        if (result) {
                            this.is_buy_now = event.target.classList.contains('buynow') ? 1 : 0;

                            setTimeout(function() {
                                document.getElementById('product-form').submit();
                            }, 0);
                        }
                    });
                },
            }
        });

        window.onload = function() {
            var thumbList = document.getElementsByClassName('thumb-list')[0];
            var thumbFrame = document.getElementsByClassName('thumb-frame');
            var productHeroImage = document.getElementsByClassName('product-hero-image')[0];

            if (thumbList && productHeroImage) {
                for (let i=0; i < thumbFrame.length ; i++) {
                    thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                    thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                }

                if (screen.width > 720) {
                    thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.height = productHeroImage.offsetHeight + "px";
                }
            }

            window.onresize = function() {
                if (thumbList && productHeroImage) {

                    for(let i=0; i < thumbFrame.length; i++) {
                        thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                        thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                    }

                    if (screen.width > 720) {
                        thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.height = productHeroImage.offsetHeight + "px";
                    }
                }
            }
        };
    </script>
@endpush