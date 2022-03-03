@if (count(app('Webkul\Product\Repositories\ProductRepository')->getNewProducts()))
<section id="our-latest-products" class="content latest-products ">
        <div class="featured-heading heading">
            <h2>Our Latest Products</h2>
        </div>
       
       
        <div class="product-grid-4">
            <div class="productbg row">
                @foreach (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts() as $productFlat)

                @if (core()->getConfigData('catalog.products.homepage.out_of_stock_items'))
                    @include ('shop::products.list.card', ['product' => $productFlat])
                @else
                    @if ($productFlat->isSaleable())
                        @include ('shop::products.list.card', ['product' => $productFlat])
                    @endif
                @endif

                @endforeach
            </div>
         	<div class="viewmore">
            <a href="#" class="btn bg-blue new">View All</a>
        </div>   
        </div>
		 
    </section>
@endif