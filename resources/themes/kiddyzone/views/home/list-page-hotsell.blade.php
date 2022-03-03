<link rel="stylesheet" href="{{ asset('/themes/kiddyzone/assets/css/responsive.css') }}">

@if (count(app('Webkul\Velocity\Helpers\Helper')->getHotSellersProducts()))
    <section class="featured-products hot">
        <div class="product-grid-12">
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
