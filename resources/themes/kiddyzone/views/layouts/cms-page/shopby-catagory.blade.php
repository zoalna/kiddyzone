<section id="shop-categories" class="shop-by-category">
    <div class="container-fluid">
        <div class="row">
        	<div class="col-xs-12 col-md-12">
            	<div class="heading">
                	<h2>Shop By Category</h2>
                </div>
            </div>
        </div>
        <div class="row agebox">
        @php
            $categories = [];
            
            foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
                if ($category->slug)
                array_push($categories, $category);
            }
        @endphp

       
            @foreach($categories as $category_data)

                <div class="col-xs-12 age-block homecat">
                <a href="{{  $category_data->slug }}" class="remove-decoration normal-white-text">
                    <img data-src="{{ asset ('/storage/' . $category_data->category_icon_path) }}" class="lazyload" alt="" />
                    <div class="age-text">
                        <h2>{{ $category_data->name }}</h2>
                    </div>
                </a>
                <!-- {{ print_r($category_data) }}  -->
                </div>
            @endforeach
       
        </div>
    </div>
</section>