<section id="browse-brand">
    <div class="container-fluid">
        <div class="heading">
            <h2>Browse By Brands</h2>
        </div>
    <div class="brand-logo">
    @php
            $categories = [];
            
            foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(15) as $category) {
                if ($category->slug)
                array_push($categories, $category);
            }
        @endphp
    <ul>
    @foreach($categories as $category_data)
    <!-- {{ print_r($category_data) }}  -->
        <li> <a href="{{  $category_data->url_path }}"><img alt="{{ $category_data->name }}" src="{{ asset ('/storage/' . $category_data->category_icon_path) }}"></a> </li>
     @endforeach
       
        
    </ul>  
    </div>
    </div>
</section>