<link rel="stylesheet" href="{{ asset('/themes/kiddyzone/assets/css/responsive.css') }}">
@if (count(app('Webkul\Velocity\Helpers\Helper')->getHotSellersProducts()))
<section id="hot-Sellers" class="content hot-sellers featured-products hot">
        <div class="heading">
        <h2> Recently Viewed Products</h2>
        </div>
        

        <!-- <div class="product-grid-4"> -->
 

         <!--  @if (count(app('Webkul\Velocity\Helpers\Helper')->getHotSellersProducts()))

          <div class="productbg row" id="fearured-products-carousel" >
            
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

        @php             
            $count = 10;
            $direction = core()->getCurrentLocale()->direction == 'rtl' ? 'rtl' : 'ltr';
        @endphp -->
        <div class="recently-pro bg-yellow">
            <div class="hot-seller row">   
                
                <product-collections
                    product-id="fearured-products-carousel"
                    
                    product-route="{{ route('velocity.category.details', ['category-slug' => 'hot-products', 'count' => $count]) }}"
                    locale-direction="{{ $direction }}"
                    count="{{ (int) $count }}">
                </product-collections>

            </div>
            <div class="viewmore recently">
            <a href="#" class="btn bg-blue">View All</a>
        </div>  
        </div>
              
    </div>

    </section>
@endif