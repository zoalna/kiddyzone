<div class="order-summarys fs16">
    <h3 class="fw6">YOUR ORDER</h3>
    <div class="cart-item-list">
        <div class="row no-padding no-margin">
            <span class="col-8 no-padding no-margin">Product</span>
            <span class="col-4 text-right no-padding no-margin">Total</span>
        </div>
        <hr>
        @foreach ($cart->items as $item)
            @php
                $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
            @endphp
            <div class="row no-padding no-margin">
                <span class="col-8 no-padding no-margin">{{ $item->product->name }}</span>
                <span class="col-4 text-right no-padding no-margin">{{ core()->currency($item->base_total) }}</span>
            </div>
        @endforeach
        <hr>
    </div>
    <div class="row no-padding no-margin">
        <span class="col-8 no-padding no-margin">{{ __('velocity::app.checkout.sub-total') }}</span>
        <span class="col-4 text-right no-padding no-margin">{{ core()->currency($cart->base_sub_total) }}</span>
    </div>

    @if ($cart->selected_shipping_rate)
        <div class="row no-padding no-margin">
            <span class="col-8 no-padding no-margin">{{ __('shop::app.checkout.total.delivery-charges') }}</span>
            <span class="col-4 text-right no-padding no-margin">{{ core()->currency($cart->selected_shipping_rate->base_price) }}</span>
        </div>
    @endif
  
    @if ($cart->base_tax_total)
        @foreach (Webkul\Tax\Helpers\Tax::getTaxRatesWithAmount($cart, true) as $taxRate => $baseTaxAmount )
            <div class="row no-padding no-margin">
                <span class="col-8 no-padding no-margin" id="taxrate-{{ core()->taxRateAsIdentifier($taxRate) }}">{{ __('shop::app.checkout.total.tax') }} {{ $taxRate }} %</span>
                <span class="col-4 text-right no-padding no-margin" id="basetaxamount-{{ core()->taxRateAsIdentifier($taxRate) }}">{{ core()->currency($baseTaxAmount) }}</span>
            </div>
        @endforeach
    @endif
    @if (
        $cart->base_discount_amount
        && $cart->base_discount_amount > 0
    )
    <div
        id="discount-detail"
        class="row">

        <span class="col-8">{{ __('shop::app.checkout.total.disc-amount') }}</span>
        <span class="col-4 text-right">
            -{{ core()->currency($cart->base_discount_amount) }}
        </span>
    </div>
    @endif
    <hr>
    <div class="payable-amount row no-padding no-margin" id="grand-total-detail">
        <span class="col-8 no-padding no-margin">{{ __('shop::app.checkout.total.grand-total') }}</span>
        <span class="col-4 no-padding no-margin text-right fw6" id="grand-total-amount-detail">
            {{ core()->currency($cart->base_grand_total) }}
        </span>
    </div>
    <hr>
    <div class="row">
        @php
            $minimumOrderAmount = (float) core()->getConfigData('sales.orderSettings.minimum-order.minimum_order_amount') ?? 0;
        @endphp
        <proceed-to-checkout
            href="{{ route('shop.checkout.onepage.index') }}"
            add-class="theme-btn text-uppercase col-12 remove-decoration fw6 text-center"
            text="{{ __('velocity::app.checkout.proceed') }}"
            is-minimum-order-completed="{{ $cart->checkMinimumOrder() }}"
            minimum-order-message="{{ __('shop::app.checkout.cart.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)]) }}">
        </proceed-to-checkout>
    </div>
</div>