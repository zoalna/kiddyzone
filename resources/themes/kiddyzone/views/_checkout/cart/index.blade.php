@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')

@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.cart.title') }}
@stop

@section('content-wrapper')
    <cart-component></cart-component>
@endsection

@push('css')
    <style type="text/css">
        .quantity {
            width: unset;
            float: right;
        }

        .alert-wishlist {
            display: inline-block;
            position: relative;
            top: -2px;
        }
    </style>
@endpush

@push('scripts')
    @include('shop::checkout.cart.coupon')

    <script type="text/x-template" id="cart-template">
        <div class="container cart-page">
            <div class="mainbanner">
                <div class="top-banner">
                    <div class="page-title">
                        <h1>Cart</h1>
                    </div>
                    <img src="{{ asset('/themes/kiddyzone/assets/images/banners/cart-banner.png') }}" alt="listing-banner" class="img-responsive">
                </div>
            </div>
            <section class="cart-details row col-12 cart-page">
                @if ($cart)
                    <div class="cart-details-header col-lg-8 col-md-12">
                        <div class="row cart-header col-12 no-padding">                              
                            <span class="col-4 fw6 fs16 pr0 text-center">
                                {{ __('velocity::app.checkout.items') }}
                            </span>
                            <span class="col-2 fw6 fs16 pr0 text-center">
                                Color & Size
                            </span>
                            <span class="col-2 fw6 fs16 pr0 text-center">
                                {{ __('velocity::app.checkout.qty') }}
                            </span>
                            <span class="col-2 fw6 fs16 pr0 text-center">
                                    Price
                                    
                            </span>
                            <span class="col-2 fw6 fs16 pr0 text-center">
                                {{ __('velocity::app.checkout.subtotal') }}
                            </span>
                        </div>

                        <div class="cart-content col-12">
                            <form
                                method="POST"
                                @submit.prevent="onSubmit"
                                action="{{ route('shop.checkout.cart.update') }}">

                                <div class="cart-item-list">
                                    @csrf

                                    @foreach ($cart->items as $key => $item)

                                        @php
                                            $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
                                            $product = $item->product;

                                            $productPrice = $product->getTypeInstance()->getProductPrices();

                                            if (is_null ($product->url_key)) {
                                                if (! is_null($product->parent)) {
                                                    $url_key = $product->parent->url_key;
                                                }
                                            } else {
                                                $url_key = $product->url_key;
                                            }

                                        @endphp

                                        <div class="cart-page-content row col-12" v-if="!isMobileDevice">
                                            <div class="product-content-custom col-4 custom-border">
                                                <a
                                                    title="{{ $product->name }}"
                                                    class="product-image-container"
                                                    href="{{ route('shop.productOrCategory.index', $url_key) }}">

                                                    <img
                                                        class="card-img-top"
                                                        alt="{{ $product->name }}"
                                                        src="{{ $productBaseImage['large_image_url'] }}"
                                                        :onerror="`this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`">
                                                </a>

                                                <div class="product-details-content pr0">
                                                    <div class="row item-title no-margin">
                                                        <a
                                                            href="{{ route('shop.productOrCategory.index', $url_key) }}"
                                                            title="{{ $product->name }}"
                                                            class="unset col-12 no-padding">

                                                            <span class="fs20 fw6 link-color">{{ $product->name }}</span>
                                                        </a>
                                                    </div>
                                                    @php
                                                        $moveToWishlist = trans('shop::app.checkout.cart.move-to-wishlist');

                                                        $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false;
                                                    @endphp

                                                    <div class="no-padding col-12 cursor-pointer fs16">
                                                        @auth('customer')
                                                            @if ($showWishlist)
                                                                @if ($item->parent_id != 'null' ||$item->parent_id != null)
                                                                    <div @click="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')" class="alert-wishlist">
                                                                        @include('shop::products.wishlist', [
                                                                            'route' => route('shop.movetowishlist', $item->id),
                                                                            'text' => "<span class='align-vertical-super'>$moveToWishlist</span>"
                                                                        ])
                                                                    </div>
                                                                @else
                                                                    <div @click="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')" class="alert-wishlist">
                                                                        @include('shop::products.wishlist', [
                                                                            'route' => route('shop.movetowishlist', $item->child->id),
                                                                            'text' => "<span class='align-vertical-super'>$moveToWishlist</span>"
                                                                        ])
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endauth

                                                        <div class="d-inline-block">
                                                            <a
                                                                class="unset
                                                                    @auth('customer')
                                                                        ml10
                                                                    @endauth
                                                                "
                                                                href="{{ route('shop.checkout.cart.remove', ['id' => $item->id]) }}"
                                                                @click="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">

                                                                <span class="rango-delete fs24"></span>
                                                                <span class="align-vertical-super">{{ __('shop::app.checkout.cart.remove') }}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="size-color col-2 custom-border">
                                                @if (isset($item->additional['attributes']))
                                                    @foreach ($item->additional['attributes'] as $attribute)
                                                        <div class="row col-12 no-padding no-margin display-block">
                                                            <label class="no-margin">
                                                                {{ $attribute['attribute_name'] }} :
                                                            </label>
                                                            <span>
                                                                {{ $attribute['option_label'] }}
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="product-quantity col-2 no-padding custom-border">
                                                <cart-quantity-changer
                                                    :control-name="'qty[{{$item->id}}]'"
                                                    quantity="{{ $item->quantity }}"
                                                    quantity-text="{{ __('shop::app.products.quantity') }}">
                                                </cart-quantity-changer>
                                            </div>
                                            <div class="row col-2 no-padding no-margin custom-border">
                                                <div class="product-price">
                                                    <span>{{ core()->currency($item->base_price) }}</span>
                                                </div>
                                            </div>
                                            <div class="product-price fs18 col-2 custom-border">
                                                <span class="card-current-price fw6 mr10">
                                                    {{ core()->currency( $item->base_total) }}
                                                </span>
                                            </div>

                                            @if (! cart()->isItemHaveQuantity($item))
                                                <div class="control-error mt-4 fs16 fw6">
                                                    * {{ __('shop::app.checkout.cart.quantity-error') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="row col-12" v-else>
                                            <a
                                                title="{{ $product->name }}"
                                                class="product-image-container col-2"
                                                href="{{ route('shop.productOrCategory.index', $url_key) }}">

                                                <img
                                                    src="{{ $productBaseImage['medium_image_url'] }}"
                                                    class="card-img-top"
                                                    alt="{{ $product->name }}">
                                            </a>

                                            <div class="col-10 pr0 item-title">
                                                <a
                                                    href="{{ route('shop.productOrCategory.index', $url_key) }}"
                                                    title="{{ $product->name }}"
                                                    class="unset col-12 no-padding">

                                                    <span class="fs20 fw6 link-color">{{ $product->name }}</span>
                                                </a>

                                                @if (isset($item->additional['attributes']))
                                                    <div class="row col-12 no-padding no-margin">

                                                        @foreach ($item->additional['attributes'] as $attribute)
                                                            <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                                        @endforeach

                                                    </div>
                                                @endif

                                                <div class="col-12 no-padding">
                                                    @include ('shop::products.price', ['product' => $product])
                                                </div>

                                                <div class="row col-12 remove-padding-margin actions">
                                                    <div class="product-quantity col-lg-4 col-6 no-padding">
                                                        <quantity-changer
                                                            :control-name="'qty[{{$item->id}}]'"
                                                            quantity="{{ $item->quantity }}"
                                                            quantity-text="{{ __('shop::app.products.quantity') }}">
                                                        </quantity-changer>
                                                    </div>

                                                    <div class="col-4 cursor-pointer text-down-4">
                                                        <a href="{{ route('shop.checkout.cart.remove', ['id' => $item->id]) }}" class="unset">
                                                            <i class="material-icons fs24">delete</i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    @endforeach
                                </div>

                                {!! view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]) !!}
                                <div class="update-section">
                                    
                                        <button
                                            type="submit"
                                            class="theme-btn light mr15 unset">

                                            {{ __('shop::app.checkout.cart.update-cart') }}
                                        </button>
                                    
                                        <a
                                            class="col-12 link-color remove-decoration fs16 no-padding"
                                            href="{{ route('shop.home.index') }}">
                                            {{ __('shop::app.checkout.cart.continue-shopping') }}
                                        </a>
                                    
                                </div>
                                {!! view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]) !!}
                            </form>
                        </div>
                        @include ('shop::products.view.cross-sells')
                    </div>
                @endif

                {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}

                    @if ($cart)
                        <div class="col-lg-4 col-md-12 row order-summary-container " style="background: #F6F6F6;">
                            @include('shop::checkout.total.summary', ['cart' => $cart])

                            <coupon-component></coupon-component>
                        </div>
                    @else
                        <div class="fs16 col-12 empty-cart-message">
                            {{ __('shop::app.checkout.cart.empty') }}
                        </div>

                        <a
                            class="fs16 mt15 col-12 remove-decoration continue-shopping"
                            href="{{ route('shop.home.index') }}">

                            <button type="button" class="theme-btn remove-decoration">
                                {{ __('shop::app.checkout.cart.continue-shopping') }}
                            </button>
                        </a>
                    @endif

                {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}
            </section>
        </div>
    </script>

    <script type="text/javascript" id="cart-template">
        (() => {
            Vue.component('cart-component', {
                template: '#cart-template',
                data: function () {
                    return {
                        isMobileDevice: this.isMobile(),
                    }
                },

                methods: {
                    removeLink(message) {
                        if (! confirm(message))
                            event.preventDefault();
                    }
                }
            })
        })()
    </script>
@endpush