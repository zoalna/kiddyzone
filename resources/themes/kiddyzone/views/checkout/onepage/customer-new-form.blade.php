

@php
    $isCustomer = auth()->guard('customer')->check();
@endphp
    @if (isset($shipping) && $shipping)
        <div :class="`col-12 form-field mb30 ${errors.has('address-form.shipping[first_name]') ? 'has-error' : ''}`">
            <label for="shipping[first_name]" class="mandatory" style="width: unset;">
                {{ __('shop::app.checkout.onepage.first-name') }}
            </label>

            <input
                type="text"
                class="control"
                v-validate="'required'"
                id="shipping[first_name]"
                name="shipping[first_name]"
                v-model="address.shipping.first_name"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.first-name') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[first_name]')" v-text="errors.first('address-form.shipping[first_name]')"></span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.shipping[last_name]') ? 'has-error' : ''}`">
            <label for="shipping[last_name]" class="mandatory">
                {{ __('shop::app.checkout.onepage.last-name') }}
            </label>

            <input
                type="text"
                class="control"
                v-validate="'required'"
                id="shipping[last_name]"
                name="shipping[last_name]"
                v-model="address.shipping.last_name"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.last-name') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[last_name]')" v-text="errors.first('address-form.shipping[last_name]')"></span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.shipping[email]') ? 'has-error' : ''}`">
            <label for="shipping[email]" class="mandatory">
                {{ __('shop::app.checkout.onepage.email') }}
            </label>

            <input
                type="text"
                class="control"
                id="shipping[email]"
                name="shipping[email]"
                v-validate="'required|email'"
                v-model="address.shipping.email"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.email') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[email]')" v-text="errors.first('address-form.shipping[email]')"></span>
        </div>

 
        <div :class="`col-12 form-field ${errors.has('address-form.shipping[address1][]') ? 'has-error' : ''}`" style="margin-bottom: 0;">
            <label for="shipping_address_0" class="mandatory">
                {{ __('shop::app.checkout.onepage.address1') }}
            </label>

            <input
                type="text"
                class="control"
                v-validate="'required'"
                id="shipping_address_0"
                name="shipping[address1][]"
                v-model="address.shipping.address1[0]"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.address1') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[address1][]')" v-text="errors.first('address-form.shipping[address1][]')"></span>
        </div>

        @if (
            core()->getConfigData('customer.settings.address.street_lines')
            && core()->getConfigData('customer.settings.address.street_lines') > 1
        )
            @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                <div class="col-12 form-field" style="margin-top: 10px; margin-bottom: 0">
                    <input
                        type="text"
                        class="control"
                        id="shipping_address_{{ $i }}"
                        name="shipping[address1][{{ $i }}]"
                        @change="validateForm('address-form')"
                        v-model="address.shipping.address1[{{$i}}]" />
                </div>
            @endfor
        @endif

        <div :class="`col-12 form-field ${errors.has('address-form.shipping[city]') ? 'has-error' : ''}`" style="margin-top: 15px;">
            <label for="shipping[city]" class="mandatory">
                {{ __('shop::app.checkout.onepage.city') }}
            </label>

            <input
                type="text"
                class="control"
                id="shipping[city]"
                name="shipping[city]"
                v-validate="'required'"
                v-model="address.shipping.city"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.city') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[city]')" v-text="errors.first('address-form.shipping[city]')"></span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.shipping[country]') ? 'has-error' : ''}`">
            <label for="shipping[country]" class="mandatory">
                {{ __('shop::app.checkout.onepage.country') }}
            </label>

            <select
                type="text"
                id="shipping[country]"
                v-validate="'required'"
                name="shipping[country]"
                class="control styled-select"
                v-model="address.shipping.country"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.country') }}&quot;">

                <option value=""></option>

                <option v-for='(country, index) in countries' :value="country.code">
                    @{{ country.name }}
                </option>
            </select>

            <div class="select-icon-container">
                <i class="select-icon rango-arrow-down"></i>
            </div>

            <span class="control-error" v-if="errors.has('address-form.shipping[country]')" v-text="errors.first('address-form.shipping[country]')"></span>
        </div>


        <div :class="`col-12 form-field ${errors.has('address-form.shipping[state]') ? 'has-error' : ''}`">
            <label for="shipping[state]" class="mandatory">
                {{ __('shop::app.checkout.onepage.state') }}
            </label>

            <input
                type="text"
                class="control"
                id="shipping[state]"
                name="shipping[state]"
                v-validate="'required'"
                v-if="!haveStates('shipping')"
                v-model="address.shipping.state"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.state') }}&quot;" />

            <select
                id="shipping[state]"
                name="shipping[state]"
                v-validate="'required'"
                class="control styled-select"
                v-if="haveStates('shipping')"
                v-model="address.shipping.state"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.state') }}&quot;">

                <option value="">{{ __('shop::app.checkout.onepage.select-state') }}</option>

                <option v-for='(state, index) in countryStates[address.shipping.country]' :value="state.code">
                    @{{ state.default_name }}
                </option>
            </select>

            <div class="select-icon-container" v-if="haveStates('shipping')">
                <i class="select-icon rango-arrow-down"></i>
            </div>

            <span class="control-error" v-if="errors.has('address-form.shipping[state]')" v-text="errors.first('address-form.shipping[state]')"></span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.shipping[postcode]') ? 'has-error' : ''}`">
            <label for="shipping[postcode]" class="mandatory">
                {{ __('shop::app.checkout.onepage.postcode') }}
            </label>

            <input
                type="text"
                class="control"
                id="shipping[postcode]"
                v-validate="'required'"
                name="shipping[postcode]"
                v-model="address.shipping.postcode"
                @keyup="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.postcode') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[postcode]')" v-text="errors.first('address-form.shipping[postcode]')"></span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.shipping[phone]') ? 'has-error' : ''}`">
            <label for="shipping[phone]" class="mandatory">
                {{ __('shop::app.checkout.onepage.phone') }}
            </label>

            <input
                type="text"
                class="control"
                id="shipping[phone]"
                name="shipping[phone]"
                v-validate="'required|numeric'"
                v-model="address.shipping.phone"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.phone') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.shipping[phone]')" v-text="errors.first('address-form.shipping[phone]')"></span>
        </div>

        @auth('customer')
            <div class="mb10">
                <span class="checkbox fs16 display-inbl no-margin">
                    <input
                        type="checkbox"
                        id="shipping[save_as_address]"
                        name="shipping[save_as_address]"
                        @change="validateForm('address-form')"
                        v-model="address.shipping.save_as_address"/>

                    <span>
                        {{ __('shop::app.checkout.onepage.save_as_address') }}
                    </span>
                </span>
            </div>
        @endauth

    @elseif (isset($billing) && $billing)
        <!-- <div :class="`col-12 form-field ${errors.has('address-form.billing[company_name]') ? 'has-error' : ''}`">
            <label for="billing[company_name]">
                {{ __('shop::app.checkout.onepage.company-name') }}
            </label>

            <input
                type="text"
                class="control"
                id="billing[company_name]"
                name="billing[company_name]"
                v-model="address.billing.company_name"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.company-name') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[company_name]')" v-text="errors.first('address-form.billing[company_name]')"></span>
        </div> -->
        <div class="col-12 towcolom">
            <div :class="`col-6 nice form-field ${errors.has('address-form.billing[first_name]') ? 'has-error' : ''}`">
                <label for="billing[first_name]" class="mandatory">
                    {{ __('shop::app.checkout.onepage.first-name') }}
                </label>

                <input
                    type="text"
                    class="control"
                    v-validate="'required'"
                    id="billing[first_name]"
                    name="billing[first_name]"
                    v-model="address.billing.first_name"
                    @change="validateForm('address-form')"
                    data-vv-as="&quot;{{ __('shop::app.checkout.onepage.first-name') }}&quot;" />

                <span class="control-error" v-if="errors.has('address-form.billing[first_name]')" v-text="errors.first('address-form.billing[first_name]')"></span>
            </div>

            <div :class="`col-6 nice form-field ${errors.has('address-form.billing[last_name]') ? 'has-error' : ''}`">
                <label for="billing[last_name]" class="mandatory">
                    {{ __('shop::app.checkout.onepage.last-name') }}
                </label>

                <input
                    type="text"
                    v-validate="'required'"
                    class="control"
                    id="billing[last_name]"
                    name="billing[last_name]"
                    v-model="address.billing.last_name"
                    @change="validateForm('address-form')"
                    data-vv-as="&quot;{{ __('shop::app.checkout.onepage.last-name') }}&quot;" />

                <span class="control-error" v-if="errors.has('address-form.billing[last_name]')" v-text="errors.first('address-form.billing[last_name]')"></span>
            </div>
        </div>
        <div :class="`col-12 form-field ${errors.has('address-form.billing[email]') ? 'has-error' : ''}`">
            <label for="billing[email]" class="mandatory">
                {{ __('shop::app.checkout.onepage.email') }}
            </label>

            <input
                type="text"
                class="control"
                id="billing[email]"
                name="billing[email]"
                @blur="isCustomerExist"
                v-validate="'required|email'"
                v-model="address.billing.email"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.email') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[email]')" v-text="errors.first('address-form.billing[email]')"></span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.billing[gpslocation]') ? 'has-error' : ''}`">
            <label for="billing[email]" class="mandatory">
                {{ __('GPS Location ') }}
            </label>
            <input
                type="text"
                class="control"
                id="billing[gpslocation]"
                name="billing[gpslocation]"
                @blur="isCustomerExist"
                v-validate="'required|gpslocation'"
                v-model="address.billing.gpslocation"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('GPS location') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[gpslocation]')" v-text="errors.first('address-form.billing[gpslocation]')"></span>
        </div>
 
        <div class="col-md-12">
            <div class="gps-location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462560.3012030251!2d54.9475610883428!3d25.076381466775658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2s!4v1642426034582!5m2!1sen!2s" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        {{--  for customer login checkout   --}}
        @if (! $isCustomer)
            @include('shop::checkout.onepage.customer-checkout')
        @endif
        <div :class="`col-12 form-field ${errors.has('address-form.billing[country]') ? 'has-error' : ''}`">
            <label for="billing[country]" class="mandatory">
                {{ __('shop::app.checkout.onepage.country') }}
            </label>

            <select
                type="text"
                id="billing[country]"
                name="billing[country]"
                v-validate="'required'"
                class="control styled-select"
                v-model="address.billing.country"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.country') }}&quot;">

                <option value=""></option>

                <option v-for='(country, index) in countries' :value="country.code">
                    @{{ country.name }}
                </option>
            </select>

            <div class="select-icon-container">
                <i class="select-icon rango-arrow-down"></i>
            </div>

            <span class="control-error" v-if="errors.has('address-form.billing[country]')" v-text="errors.first('address-form.billing[country]')"></span>
        </div>
        <div :class="`col-12 form-field ${errors.has('address-form.billing[address1][]') ? 'has-error' : ''}`">
            <label for="billing_address_0" class="mandatory">
                {{ __('shop::app.checkout.onepage.address1') }}
            </label>

            <input
                type="text"
                class="control"
                v-validate="'required'"
                placeholder="Street Address"
                id="billing_address_0"
                name="billing[address1][]"
                v-model="address.billing.address1[0]"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.address1') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[address1][]')" v-text="errors.first('address-form.billing[address1][]')"></span>
        </div>
        
        @if (
            core()->getConfigData('customer.settings.address.street_lines')
            && core()->getConfigData('customer.settings.address.street_lines') > 1
        )
            @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                <div class="col-12 form-field" style="margin-top: 10px; margin-bottom: 0">
                        <input
                            type="text"
                            class="control"
                            id="billing_address_{{ $i }}"
                            name="billing[address1][{{ $i }}]"
                            v-model="address.billing.address1[{{$i}}]" />
                </div>
            @endfor
        @endif
        <div :class="`col-12 form-field ${errors.has('address-form.billing[postcode]') ? 'has-error' : ''}`">
            <label for="billing[postcode]" class="mandatory">
                {{ __('shop::app.checkout.onepage.postcode') }}
            </label>

            <input
                type="text"
                class="control"
                id="billing[postcode]"
                placeholder="Zip/Postcode"
                v-validate="'required'"
                name="billing[postcode]"
                v-model="address.billing.postcode"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.postcode') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[postcode]')" v-text="errors.first('address-form.billing[postcode]')"></span>
        </div>
        <div :class="`col-12 form-field ${errors.has('address-form.billing[city]') ? 'has-error' : ''}`" style="margin-top: 15px;">
            <label for="billing[city]" class="mandatory">
                {{ __('shop::app.checkout.onepage.city') }}
            </label>

            <input
                type="text"
                class="control"
                id="billing[city]"
                name="billing[city]"
                placeholder="City"
                v-validate="'required'"
                v-model="address.billing.city"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.city') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[city]')" v-text="errors.first('address-form.billing[city]')"></span>
        </div>

        <div :class="`col-12 form-field ${errors.has('address-form.billing[state]') ? 'has-error' : ''}`">
            <label for="billing[state]" class="mandatory">
                {{ __('shop::app.checkout.onepage.state') }}
            </label>

            <input
                type="text"
                class="control"
                id="billing[state]"
                name="billing[state]"
                v-validate="'required'"
                v-if="!haveStates('billing')"
                v-model="address.billing.state"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.state') }}&quot;" />

            <select
                id="billing[state]"
                name="billing[state]"
                v-validate="'required'"
                v-if="haveStates('billing')"
                class="control styled-select"
                v-model="address.billing.state"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.state') }}&quot;">

                <option value="">{{ __('shop::app.checkout.onepage.select-state') }}</option>

                <option v-for='(state, index) in countryStates[address.billing.country]' :value="state.code">
                    @{{ state.default_name }}
                </option>
            </select>
            <div class="select-icon-container" v-if="haveStates('billing')">
                <i class="select-icon rango-arrow-down"></i>
            </div>

            <span class="control-error" v-if="errors.has('address-form.billing[state]')" v-text="errors.first('address-form.billing[state]')"></span>
        </div>
        <div :class="`col-12 form-field ${errors.has('address-form.billing[phone]') ? 'has-error' : ''}`">
            <label for="billing[phone]" class="mandatory">
                {{ __('shop::app.checkout.onepage.phone') }}
            </label>

            <input
                type="text"
                class="control"
                id="billing[phone]"
                name="billing[phone]"
                v-validate="'required|numeric'"
                v-model="address.billing.phone"
                @change="validateForm('address-form')"
                data-vv-as="&quot;{{ __('shop::app.checkout.onepage.phone') }}&quot;" />

            <span class="control-error" v-if="errors.has('address-form.billing[phone]')" v-text="errors.first('address-form.billing[phone]')"></span>
        </div>

        @if ($cart->haveStockableItems())
            <div class="mb10">
                <span class="checkbox fs16 display-inbl no-margin">
                    <input
                        type="checkbox"
                        id="billing[use_for_shipping]"
                        name="billing[use_for_shipping]"
                        v-model="address.billing.use_for_shipping"
                        @change="setTimeout(() => validateForm('address-form'), 0)" />

                    <span>
                        {{ __('shop::app.checkout.onepage.use_for_shipping') }}
                    </span>
                </span>
            </div>
        @endif

        @auth('customer')
            <div class="mb10">
                <span class="checkbox fs16 display-inbl no-margin">
                    <input
                        type="checkbox"
                        id="billing[save_as_address]"
                        name="billing[save_as_address]"
                        @change="validateForm('address-form')"
                        v-model="address.billing.save_as_address"/>

                    <span>
                        {{ __('shop::app.checkout.onepage.save_as_address') }}
                    </span>
                </span>
            </div>
        @endauth
    @endif