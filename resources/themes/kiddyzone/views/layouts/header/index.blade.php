<?php
    $term = request()->input('term');
    $image_search = request()->input('image-search');

    if (! is_null($term)) {
        $serachQuery = 'term='.request()->input('term');
    }
?>
<header class="sticky-header">
    <div class=" remove-padding-margin">
        <div id="logo-header" class="container-fluid">
            <div class="header-inner row">
                <div class="col-sm-3 col-xs-12 header-left">
                    <div id="logo">
                        <a class="left navbar-brand" href="{{ route('shop.home.index') }}" aria-label="Logo">
                            <img class="logo" src="{{ core()->getCurrentChannel()->logo_url ?? asset('themes/kiddyzone/assets/images/logo.svg') }}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-9 col-xs-9 header-right">
                	<button class="head-gift-btn"><img src="{{ asset('/themes/kiddyzone/assets/images/topnav/gift.svg') }}"> Gift Finder </button>
                    <div id="search" class="input-groups">
                        <div class="newsearch" style="position:relative;">
                            <ul class="search-container">
                                <li class="search-group row">
                                    <form role="search" action="{{ route('shop.search.index') }}" method="GET" style="display: inherit;">
                                        <label for="search-bar" style="position: absolute; z-index: -1;">Search</label>
                                        <input
                                            required
                                            name="term"
                                            type="search"
                                            @keyup="someFunctionRun($event)"
                                            value="{{ ! $image_search ? $term : '' }}"
                                            class="form-control"
                                            id="search-bar"
                                            placeholder="{{ __('shop::app.header.search-text') }}"
                                        >
                                        <div class="search-icon-wrapper">

                                        <button type="button" id="header-search-icon" aria-label="Search" class="btn"><i class="fs16 fw6 rango-search"></i></button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                            <div  id="old-new" class="suggest"> </div>
                        </div>
                        <!-- @include('velocity::shop.layouts.particals.search-bar') -->
                    </div>
                    <div class="helpful-text-links help-store-loc for-desktop">
                        <ul class="list-inline row">
                            <li><a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/topnav/location-pin.svg') }}">Store Locator</a></li>
                            <li><a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/topnav/help.svg') }}">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- <div id="logo-header" class="container-fluid">
            
        </div>
        <a class="left navbar-brand" href="{{ route('shop.home.index') }}" aria-label="Logo">
            <img class="logo" src="{{ core()->getCurrentChannel()->logo_url ?? asset('themes/velocity/assets/images/logo-text.png') }}" alt="" />
        </a>

        <div class="right searchbar">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    @include('velocity::shop.layouts.particals.search-bar')
                </div> -->
<!-- 
                <div class="col-lg-7 col-md-12 vc-full-screen">
                    <div class="left-wrapper">

                        {!! view_render_event('bagisto.shop.layout.header.wishlist.before') !!}

                            @include('velocity::shop.layouts.particals.wishlist', ['isText' => true])

                        {!! view_render_event('bagisto.shop.layout.header.wishlist.after') !!}

                        {!! view_render_event('bagisto.shop.layout.header.compare.before') !!}

                            @include('velocity::shop.layouts.particals.compare', ['isText' => true])

                        {!! view_render_event('bagisto.shop.layout.header.compare.after') !!}

                        {!! view_render_event('bagisto.shop.layout.header.cart-item.before') !!}

                            @include('shop::checkout.cart.mini-cart')

                        {!! view_render_event('bagisto.shop.layout.header.cart-item.after') !!}
                    </div>
                </div> -->

    
</header>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet" defer></script>

    <script type="text/x-template" id="image-search-component-template">
        <div v-if="image_search_status">
            <label class="image-search-container" :for="'image-search-container-' + _uid">
                <i class="icon camera-icon"></i>

                <input type="file" :id="'image-search-container-' + _uid" ref="image_search_input" v-on:change="uploadImage()"/>

                <img :id="'uploaded-image-url-' +  + _uid" :src="uploaded_image_url" alt="" width="20" height="20" />
            </label>
        </div>
    </script>

    <script>

        Vue.component('image-search-component', {

            template: '#image-search-component-template',

            data: function() {
                return {
                    uploaded_image_url: '',
                    image_search_status: "{{core()->getConfigData('general.content.shop.image_search') == '1' ? 'true' : 'false'}}" == 'true'
                }
            },

            methods: {
                uploadImage: function() {
                    var imageInput = this.$refs.image_search_input;

                    if (imageInput.files && imageInput.files[0]) {
                        if (imageInput.files[0].type.includes('image/')) {
                            var self = this;

                            if (imageInput.files[0].size <= 2000000) {
                                self.$root.showLoader();

                                var formData = new FormData();

                                formData.append('image', imageInput.files[0]);

                                axios.post("{{ route('shop.image.search.upload') }}", formData, {headers: {'Content-Type': 'multipart/form-data'}})
                                    .then(function(response) {
                                        self.uploaded_image_url = response.data;

                                        var net;

                                        async function app() {
                                            var analysedResult = [];

                                            var queryString = '';

                                            net = await mobilenet.load();

                                            const imgElement = document.getElementById('uploaded-image-url-' +  + self._uid);

                                            try {
                                                const result = await net.classify(imgElement);

                                                result.forEach(function(value) {
                                                    queryString = value.className.split(',');

                                                    if (queryString.length > 1) {
                                                        analysedResult = analysedResult.concat(queryString)
                                                    } else {
                                                        analysedResult.push(queryString[0])
                                                    }
                                                });
                                            } catch (error) {
                                                self.$root.hideLoader();

                                                window.flashMessages = [
                                                    {
                                                        'type': 'alert-error',
                                                        'message': "{{ __('shop::app.common.error') }}"
                                                    }
                                                ];

                                                self.$root.addFlashMessages();
                                            };

                                            localStorage.searched_image_url = self.uploaded_image_url;

                                            queryString = localStorage.searched_terms = analysedResult.join('_');

                                            self.$root.hideLoader();

                                            window.location.href = "{{ route('shop.search.index') }}" + '?term=' + queryString + '&image-search=1';
                                        }

                                        app();
                                    })
                                    .catch(function(error) {
                                        self.$root.hideLoader();

                                        window.flashMessages = [
                                            {
                                                'type': 'alert-error',
                                                'message': "{{ __('shop::app.common.error') }}"
                                            }
                                        ];

                                        self.$root.addFlashMessages();
                                    });
                            } else {

                                imageInput.value = '';

                                        window.flashMessages = [
                                            {
                                                'type': 'alert-error',
                                                'message': "{{ __('shop::app.common.image-upload-limit') }}"
                                            }
                                        ];

                                self.$root.addFlashMessages();

                            }
                        } else {
                            imageInput.value = '';

                            alert('Only images (.jpeg, .jpg, .png, ..) are allowed.');
                        }
                    }
                }
            }
        });

    </script>

    <script>
        $(document).ready(function() {

            $('body').delegate('#search, .icon-menu-close, .icon.icon-menu', 'click', function(e) {
                toggleDropdown(e);
            });

            @auth('customer')
                @php
                    $compareCount = app('Webkul\Velocity\Repositories\VelocityCustomerCompareProductRepository')
                        ->count([
                            'customer_id' => auth()->guard('customer')->user()->id,
                        ]);
                @endphp

                let comparedItems = JSON.parse(localStorage.getItem('compared_product'));
                $('#compare-items-count').html({{ $compareCount }});
            @endauth

            @guest('customer')
                let comparedItems = JSON.parse(localStorage.getItem('compared_product'));
                $('#compare-items-count').html(comparedItems ? comparedItems.length : 0);
            @endguest

            function toggleDropdown(e) {
                var currentElement = $(e.currentTarget);

                if (currentElement.hasClass('icon-search')) {
                    currentElement.removeClass('icon-search');
                    currentElement.addClass('icon-menu-close');
                    $('#hammenu').removeClass('icon-menu-close');
                    $('#hammenu').addClass('icon-menu');
                    $("#search-responsive").css("display", "block");
                    $("#header-bottom").css("display", "none");
                } else if (currentElement.hasClass('icon-menu')) {
                    currentElement.removeClass('icon-menu');
                    currentElement.addClass('icon-menu-close');
                    $('#search').removeClass('icon-menu-close');
                    $('#search').addClass('icon-search');
                    $("#search-responsive").css("display", "none");
                    $("#header-bottom").css("display", "block");
                } else {
                    currentElement.removeClass('icon-menu-close');
                    $("#search-responsive").css("display", "none");
                    $("#header-bottom").css("display", "none");
                    if (currentElement.attr("id") == 'search') {
                        currentElement.addClass('icon-search');
                    } else {
                        currentElement.addClass('icon-menu');
                    }
                }
            }
        });
    </script>
@endpush
@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  var url = window.location.toString();
    if(url.match(/%3Cb%3E/gi) == '%3Cb%3E'){
    var urla = url.replace('%3Cb%3E','');
    window.location = urla.replace('%3C/b%3E',''); 
    }
function someFunctionRun(event){
var display_product_toggle= '<?php $hello= core()->getConfigData('suggestion.suggestion.options.display_product_toggle');
                    echo $hello ?>';   
   var no_of_terms = '<?php $hello= core()->getConfigData('suggestion.suggestion.options.show_terms');
                    echo $hello ?>';
      
      var display_terms_toggle ='<?php $hello= core()->getConfigData('suggestion.suggestion.options.display_terms_toggle'); 
                     echo $hello ?>';
         var no_of_products ='<?php $hello= core()->getConfigData('suggestion.suggestion.options.show_products'); 
                     echo $hello ?>';
            var display_terms_number_toggle ='<?php $hello= core()->getConfigData('suggestion.suggestion.options.display_terms_number_toggle'); 
                     echo $hello ?>';
                      var display_category='<?php $hello= core()->getConfigData('suggestion.suggestion.options.display_categories_toggle');
                     echo $hello ?>';

            var term =event.target.value;
            var obj={
                category:'',
                term:term
                };
            $.ajax({
                url:"{{ route('searchsuggestion.search.index') }}",
                type:"get",
                data:obj,
                success:function(data){
                    $('.suggest').html('');
if(term.length !== 0){
    if(data[0].data.length !== 0){
        if(display_category == 1){
              if(data[0].data.length < no_of_terms){
                        for (let index = 0; index < data[0].data.length; index++){
                            if(data[0].data[index].product.categories[0]){
                                if(data[0].data[index].product.categories[0].name == 'Root'){
                                    $('.suggest').append('<a style="color:black;text-decoration:none;"'+
                'href="'+ data[0].data[index].url_key+'"> <div class="dcategory">'+
                '<p>'+data[0].data[index].name+'</p>'+
                '</div></a>');       
                                }else{
                                    $('.suggest').append('<a style="color:black;text-decoration:none;"'+
                'href="'+ data[0].data[index].url_key+'"> <div class="dcategory">'+
                '<p>'+data[0].data[index].name+' in '+data[0].data[index].product.categories[0].name+'</p>'+
                '</div></a>');
                                }
                            }else{
                                $('.suggest').append('<a style="color:black;text-decoration:none;"'+
                'href="'+ data[0].data[index].url_key+'"> <div class="dcategory">'+
                '<p>'+data[0].data[index].name+'</p>'+
                '</div></a>');  
                            }
                         }
                    }else if (data[0].data.length >= no_of_terms) {
                        for (let index = 0; index < no_of_terms; index++){
                            if(data[0].data[index].product.categories[0]){
                                if(data[0].data[index].product.categories[0].name == 'Root'){
                                    $('.suggest').append('<a style="color:black;text-decoration:none;"'+
                'href="'+ data[0].data[index].url_key+'"> <div class="dcategory">'+
                '<p>'+data[0].data[index].name+'</p>'+
                '</div></a>');       
                                }else{
                                    $('.suggest').append('<a style="color:black;text-decoration:none;"'+
                'href="'+ data[0].data[index].url_key+'"> <div class="dcategory">'+
                '<p>'+data[0].data[index].name+' in '+data[0].data[index].product.categories[0].name+'</p>'+
                '</div></a>');
                                }
                            }else{
                                $('.suggest').append('<a style="color:black;text-decoration:none;"'+
                'href="'+ data[0].data[index].url_key+'"> <div class="dcategory">'+
                '<p>'+data[0].data[index].name+'</p>'+
                '</div></a>');  
                            }
                }
                    }
                }
                if(display_terms_toggle == 1){
                         $('.suggest').append('<a style="color:black;text-decoration:none;"'+
                         'href="categorysearch?category=&term='+term+'"><div class="terms">'+
                 '<p class="termsa">'+term+'</p>'+
                '<p class="termsb">'+data[0].data.length+'</p>'+
                '</div></a>');
                }
                if(display_product_toggle == 1){
                    $('.suggest').append('<div class="popular">'+
                 '<p>{{ __('suggestion::app.popular_products') }}</p>'+
                '</div>');
                    if (data[0].data.length < no_of_products) {
                        for(let index = 0; index < data[0].data.length; index++) {        
                        $('.suggest').append('<a style="color:black;text-decoration:none;"'+
                        'href="'+ data[0].data[index].url_key+'">'+
                        '<div class="product">'+
                        '<div class="img">'+
                        '<img style="'+
                        'width:100%;'+
                        '" src="'+data[2][index][0].small_image_url+'" >'+
                        '</div>'+
                        '<div class="imgp">'+
                        '<p class="image_name">'+data[0].data[index].name+'</p>'+
                        '<p>'+data[1][index]+'</p>'+
                        '</div></div></a>');
                        }
                    }else if(data[0].data.length >= no_of_products){
                        for (let index = 0; index < no_of_products; index++) {            
                        $('.suggest').append('<a style="color:black;text-decoration:none;"'+
                        'href="'+ data[0].data[index].url_key+'">'+
                        '<div class="product">'+
                        '<div class="img">'+
                        '<img style="'+
                        'width:100%;'+
                        '" src="'+data[2][index][0].small_image_url+'" >'+
                        '</div>'+
                        '<div class="imgp">'+
                        '<p class="image_name">'+data[0].data[index].name+'</p>'+
                        '<p>'+data[1][index]+'</p>'+
                        '</div></div></a>');
                        }
                    }
                }       
    var search = event.target.value;
    var n = search.length;
    if(n >= 2){
        var str = document.getElementById("old-new").innerHTML;
        var search = document.querySelector('input[type="search"]').value;
        var regex = new RegExp(search, 'g');
        var result = str.replace(regex, '<b>' + search + '</b>');
        document.getElementById("old-new").innerHTML = result;
    }
        }else{
        $('.suggest').append('<div class="no_result">'+
                 '<p>{{ __('suggestion::app.no_results') }}</p>'+             
                '</div>');
                                        }
                                    }
                                }
                            });
                        }
</script>
<script>
    $(document).ready(function(){    
        $(document).mouseup(function(e){
            var container = $('input[type="search"]');
            var scroll_bar = $(".suggest");
                if(!scroll_bar.is(e.target) && !container.is(e.target) && container.has(e.target).length === 0){
                    $('.suggest').hide();
               }else{
                    $('.suggest').show();
                }
        });

        $('.search').on('keyup', () => {
            var search = document.querySelector('.search').value;
    var n = search.length;
    if(n >= 2){
setTimeout(time,400);
function time(){
var str = document.getElementById("old-ne").innerHTML;
var search = document.querySelector('.search').value;
var regex = new RegExp(search, 'g');
var result = str.replace(regex, '<b>' + search + '</b>');
document.getElementById("old-ne").innerHTML = result;
}
    }
        });
    });
</script>
@endpush
