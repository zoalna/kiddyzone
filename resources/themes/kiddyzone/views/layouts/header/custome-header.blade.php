<nav id="menu" class="navbar main-menu">
  <div class="nav-inner">
    <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
      <button type="button" class="btn btn-navbar navbar-toggle"><i class="fa fa-bars"></i></button>
    </div>
    <div class="navbar-collapse">
      <ul class="main-navigation">
        <li class="home_first">
          <div>
            <div id="main-category" class="main-category fs16 unselectable fw6 cursor-pointer left">
              <i class="rango-view-list text-down-4 align-vertical-top fs18"></i> 
              <span class="pl5"><a href="{{ url('/') }}" class="parent">Home</a></span>
            </div>
          </div> 
        </li>
        <li>
          <div>
            <div id="main-category" class="main-category fs16 unselectable fw6 cursor-pointer left">
              <i class="rango-view-list text-down-4 align-vertical-top fs18"></i> 
              <span class="pl5"><a href="{{ url('/page/about-us') }}" class="parent">About Us</a></span>
            </div>
          </div>  
        </li>
        <li class="satatic-mega-menu">
          <div>
            <div id="main-category" class="main-category fs16 unselectable fw6 cursor-pointer left">
              <i class="rango-view-list text-down-4 align-vertical-top fs18"></i> 
              <span class="pl5"><a href="{{ url('/shop') }}" class="parent">Categories</a></span>
            </div>
          </div>
          <ul class="menu-mega">
            <div class="row">
              <li class="col-3">
                <div class="list-item">
                  <h4 class="title">Bags</h4>
                  <ul>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                  </ul>
                  <h4 class="title">Kid's Fashion</h4>
                  <ul>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                  </ul>
                </div>
              </li>
              <li class="col-3">
                <div class="list-item">
                  <h4 class="title">Women's Fashion</h4>
                  <ul>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                  </ul>
                  <h4 class="title">Health & Beauty</h4>
                  <ul>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                  </ul>
                </div>
              </li>
              <li class="col-3">
                <div class="list-item">
                  <h4 class="title">Home & Lifestyle</h4>
                  <ul>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                  </ul>
                </div>
              </li>
              <li class="col-3">
                <div class="list-item">
                  <img src="{{ asset('/themes/kiddyzone/assets/images/product-02.jpg') }}" loading="lazy" alt="Product Images">
                </div>
              </li>
            </div>
            <div class="brand-logo catagory">
              <h4 class="title">POPULAR BRANDS</h4>
              @php
                $categories = [];
                
                foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(15) as $category) {
                    if ($category->slug)
                    array_push($categories, $category);
                }
              @endphp
              <ul class="row" style="display:block">
                @foreach($categories as $category_data)
                <!-- {{ print_r($category_data) }}  -->
                    <li class="col-2"> <a href="{{  $category_data->url_path }}"><img alt="{{ $category_data->name }}" src="{{ asset ('/storage/' . $category_data->category_icon_path) }}"></a> </li>
                @endforeach 
              </ul>  
            </div>
          </ul>
        </li>
        <li>
          <div>  
            <div id="main-category" class="main-category fs16 unselectable fw6 cursor-pointer left">
              <i class="rango-view-list text-down-4 align-vertical-top fs18"></i> 
              <span class="pl5"><a href="{{ url('/page/mystery-box') }}" class="parent">Mystery Box</a></span>
            </div>
          </div> 
        </li>
        <li>
          <div>
            <div id="main-category" class="main-category fs16 unselectable fw6 cursor-pointer left">
              <i class="rango-view-list text-down-4 align-vertical-top fs18"></i> 
              <span class="pl5"><a href="#" class="parent">E-Learning</a></span>
            </div>
          </div>
        </li>
        <li>
          <div> 
            <div id="main-category" class="main-category fs16 unselectable fw6 cursor-pointer left">
              <i class="rango-view-list text-down-4 align-vertical-top fs18"></i> 
              <span class="pl5"><a href="{{ url('/page/gift-cards') }}" class="parent">Gift Cards</a></span>
            </div>
          </div>
        </li>
        <li class="level-top hiden_menu menu-last">
          <div>
            <div id="main-category" class="main-category fs16 unselectable fw6 cursor-pointer left">
              <i class="rango-view-list text-down-4 align-vertical-top fs18"></i> 
              <span class="pl5"><a href="#" class="parent">More</a></span>
            </div>
          </div>
          <span class="active_menu">
          </span>
          <ul>
            <li><a href="about-us.html">Rewards &amp; Giveaways</a></li>
              <li><a href="contact.html">Promotions</a> </li>
              <li class="help-store-loc for-mobile"><a href="#"><span>Store Locator</span></a></li>
              <li class="help-store-loc for-mobile"><a href="#"><span>Help</span></a></li>
              <li class="account for-mobile"><a href="#"><span>Login</span></a></li>
              <li class="account for-mobile last-menu"><a href="#"><span>Register</span></a></li>
            </ul>
        </li>   
      </ul>
    </div>
  </div>
</nav>