
@if (count(app('Webkul\Velocity\Helpers\Helper')->getHotSellersProducts()))

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
  
@endif

 