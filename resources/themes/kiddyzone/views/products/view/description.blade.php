{!! view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]) !!}
@if (isset($accordian) && $accordian)
    <!-- <accordian :title="'{{ __('shop::app.products.description') }}'" :active="true"> -->
        <div slot="header" class="accordian">
            <h3 class="no-margin display-inbl">
                Description
            </h3>
        </div>
        <div slot="body">
            <div class="full-description">
                {!! $product->description !!}
            </div>
        </div>
    <!-- </accordian> -->
@endif
{!! view_render_event('bagisto.shop.products.view.description.after', ['product' => $product]) !!}