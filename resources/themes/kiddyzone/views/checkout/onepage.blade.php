@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.onepage.title') }}
@stop

@section('content-wrapper')
    <checkout></checkout>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>

    @include('shop::checkout.cart.coupon')

    <script type="text/x-template" id="checkout-template">
        
        <div class="container">
            <div class="total">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a class="home" href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/shop') }}">Shop</a></li>
                        <li class="active"><a href="{{ url('/checkout/onepage') }}">Checkout</a></li>
                    </ol>
                </div>
            </div>
            <div class="checkout-width" style="max-width:1170px; margin:0 auto;">
                <div id="checkout" class="checkout-process row">
                    <!-- <h1 class="col-12">{{ __('velocity::app.checkout.checkout') }}</h1> -->
                    <div class="col-8" style="margin-top:70px;">
                    
                        <div class="step-content information" id="address-section">
                            @include('shop::checkout.onepage.customer-info')
                        </div>
                        
                    </div>
                    <div class="summarys-right col-4">
                        <div class="order-summary-container custome top">
                            <summary-section :key="summaryComponentKey"></summary-section>
                            <div
                                class="step-content "
                                id="shipping-section"
                                >
                                <shipping-section
                                    :key="shippingComponentKey"
                                    @onShippingMethodSelected="shippingMethodSelected($event)">
                                </shipping-section>
                            </div>
                            <div
                                class="step-content payment"
                                v-if="showPaymentSection"
                                id="payment-section">

                                <payment-section @onPaymentMethodSelected="paymentMethodSelected($event)">
                                </payment-section>

                                <coupon-component
                                    @onApplyCoupon="getOrderSummary"
                                    @onRemoveCoupon="getOrderSummary">
                                </coupon-component>
                            </div>
                            <!-- <div
                                class="step-content review"
                                v-if="showSummarySection"
                                id="summary-section">

                                <review-section :key="reviewComponentKey">
                                    <div slot="summary-section">
                                        <summary-section
                                            discount="1"
                                            :key="summaryComponentKey"
                                            @onApplyCoupon="getOrderSummary"
                                            @onRemoveCoupon="getOrderSummary"
                                        ></summary-section>
                                    </div>
                                </review-section>
                            </div> -->
                            <div class="payment-cardss">
                                <img src="{{ asset('/themes/kiddyzone/assets/images/cart/payment-method.png') }}">
                            </div>
                            <div class="paypal-button-container mt10">

                            </div>
                        </div>
                        <div slot="place-order-btn" class="text-right place-orderlast">
                            <div class="">
                                <button
                                    type="button"
                                    class="theme-btn text-right"
                                    @click="placeOrder()"
                                    :disabled="!isPlaceOrderEnabled"
                                    v-if="selected_payment_method.method != 'paypal_smart_button'"
                                    id="checkout-place-order-button">
                                    {{ __('shop::app.checkout.onepage.place-order') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
<section id="create-account" class="checkout-account bg-yellow">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 left-col">
                <div class="img-box"><img src="{{ asset('/themes/kiddyzone/assets/images/checkout-gift-box.png') }}"/></div>
            </div>    
            <div class="col-md-6 right-col">
                <div class="text-center content-box">
                    <h2>Create Account</h2>
                    <p>Enjoy %10 by your first order</p>
                    <a href="{{ url('customer/register') }}" class="bg-green btn">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</section>    
<section id="delivery-services" class="services-icons">

   <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="service one">
                    <img src="{{ asset('/themes/kiddyzone/assets/images/cart/truck.jpg') }}"/>
                    <span><h2>Easy to buy & return</h2><p>single click to buy & return</p></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service two">
                    <img src="{{ asset('/themes/kiddyzone/assets/images/cart/payment-card.jpg') }}"/>
                    <span><h2>Secure Payments</h2><p>100% payment security</p></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service three">
                    <img src="{{ asset('/themes/kiddyzone/assets/images/cart/support.jpg') }}"/>
                    <span><h2>24x7 Support Available</h2><p>support 24 hours a day</p></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service four">
                    <img src="{{ asset('/themes/kiddyzone/assets/images/cart/mobile-app.jpg') }}"/>
                    <span><h2>Shop with our App</h2><p>Download app & get offers</p></span>
                </div>
            </div>
        </div>
   </div>
    
</section>



        </div>
    </script>
    <script type="text/javascript">
        (() => {
            var reviewHtml = '';
            var paymentHtml = '';
            var summaryHtml = '';
            var shippingHtml = '';
            var paymentMethods = '';
            var customerAddress = '';
            var shippingMethods = '';

            var reviewTemplateRenderFns = [];
            var paymentTemplateRenderFns = [];
            var summaryTemplateRenderFns = [];
            var shippingTemplateRenderFns = [];
            
            @auth('customer')
                @if(auth('customer')->user()->addresses)
                    customerAddress = @json(auth('customer')->user()->addresses);
                    customerAddress.email = "{{ auth('customer')->user()->email }}";
                    customerAddress.first_name = "{{ auth('customer')->user()->first_name }}";
                    customerAddress.last_name = "{{ auth('customer')->user()->last_name }}";
                @endif
            @endauth

            Vue.component('checkout', {
                template: '#checkout-template',
                inject: ['$validator'],

                data: function () {
                    return {
                        allAddress: {},
                        current_step: 1,
                        completed_step: 0,
                        isCheckPayment: true,
                        is_customer_exist: 0,
                        disable_button: false,
                        shippingComponentKey: 1,
                        reviewComponentKey: 0,
                        summaryComponentKey: 0,
                        showPaymentSection: false,
                        showSummarySection: false,
                        isPlaceOrderEnabled: false,
                        new_billing_address: false,
                        showShippingSection: false,
                        new_shipping_address: false,
                        selected_payment_method: '',
                        selected_shipping_method: '',
                        countries: [],
                        countryStates: [],

                        step_numbers: {
                            'information': 1,
                            'shipping': 2,
                            'payment': 3,
                            'review': 4
                        },

                        address: {
                            billing: {
                                address1: [''],
                                save_as_address: false,
                                use_for_shipping: true,
                            },

                            shipping: {
                                address1: ['']
                            },
                        },
                    }
                },

                created: function () {
                    this.fetchCountries();
                    this.getRates();
                    this.getPaymentMethods();
                    this.getOrderReview();
                    this.fetchCountryStates();

                    this.getOrderSummary();

                    if (! customerAddress) {
                        this.new_shipping_address = true;
                        this.new_billing_address = true;
                    } else {
                        this.address.billing.first_name = this.address.shipping.first_name = customerAddress.first_name;
                        this.address.billing.last_name = this.address.shipping.last_name = customerAddress.last_name;
                        this.address.billing.email = this.address.shipping.email = customerAddress.email;

                        if (customerAddress.length < 1) {
                            this.new_shipping_address = true;
                            this.new_billing_address = true;
                        } else {
                            this.allAddress = customerAddress;

                            for (let country in this.countries) {
                                for (let code in this.allAddress) {
                                    if (this.allAddress[code].country) {
                                        if (this.allAddress[code].country == this.countries[country].code) {
                                            this.allAddress[code]['country'] = this.countries[country].name;
                                        }
                                    }
                                }
                            }
                        }
                    }
                },

                methods: {
                    navigateToStep: function (step) {
                        if (step <= this.completed_step) {
                            this.current_step = step;
                            this.completed_step = step - 1;
                        }
                    },

                    fetchCountries: function () {
                        let countriesEndPoint = `${this.$root.baseUrl}/api/countries?pagination=0`;

                        this.$http.get(countriesEndPoint)
                            .then(response => {
                                this.countries = response.data.data;
                            })
                            .catch(function (error) {});
                    },

                    fetchCountryStates: function () {
                        let countryStateEndPoint = `${this.$root.baseUrl}/api/country-states?pagination=0`;

                        this.$http.get(countryStateEndPoint)
                            .then(response => {
                                this.countryStates = response.data.data;
                            })
                            .catch(function (error) {});
                    },

                    haveStates: function (addressType) {
                        if (this.countryStates[this.address[addressType].country] && this.countryStates[this.address[addressType].country].length)
                            return true;

                        return false;
                    },

                    validateForm: async function (scope) {
                        var isManualValidationFail = false;

                        if (scope == 'address-form') {
                            isManualValidationFail = this.validateAddressForm();
                        }

                        if (! isManualValidationFail) {
                            await this.$validator.validateAll(scope)
                            .then(result => {
                                if (result) {
                                    switch (scope) {
                                        case 'address-form':
                                            /* loader will activate only when save as address is clicked */
                                            if (this.address.billing.save_as_address) {
                                                this.$root.showLoader();
                                            }

                                            /* this is outside because save as address also calling for
                                               saving the address in the order only */
                                            this.saveAddress();
                                            break;

                                        case 'shipping-form':
                                            if (this.showShippingSection) {
                                                this.$root.showLoader();
                                                this.saveShipping();
                                                break;
                                            }

                                        case 'payment-form':
                                            this.$root.showLoader();
                                            this.savePayment();

                                            this.isPlaceOrderEnabled = ! this.validateAddressForm();
                                            break;

                                        default:
                                            break;
                                    }

                                } else {
                                    this.isPlaceOrderEnabled = false;
                                }
                            });
                        } else {
                            this.isPlaceOrderEnabled = false;
                        }
                    },

                    validateAddressForm: function () {
                        var isManualValidationFail = false;

                        let form = $(document).find('form[data-vv-scope=address-form]');

                        // validate that if all the field contains some value
                        if (form) {
                            form.find(':input').each((index, element) => {
                                let value = $(element).val();
                                let elementId = element.id;

                                if (value == ""
                                    && element.id != 'sign-btn'
                                    && element.id != 'billing[company_name]'
                                    && element.id != 'shipping[company_name]'
                                ) {
                                    // check for multiple line address
                                    if (elementId.match('billing_address_')
                                        || elementId.match('shipping_address_')
                                    ) {
                                        // only first line address is required
                                        if (elementId == 'billing_address_0'
                                            || elementId == 'shipping_address_0'
                                        ) {
                                            isManualValidationFail = true;
                                        }
                                    } else {
                                        isManualValidationFail = true;
                                    }
                                }
                            });
                        }

                        // validate that if customer wants to use different shipping address
                        if (! this.address.billing.use_for_shipping) {
                            if (! this.address.shipping.address_id && ! this.new_shipping_address) {
                                isManualValidationFail = true;
                            }
                        }

                        return isManualValidationFail;
                    },

                    isCustomerExist: function() {
                        this.$validator.attach('address-form.billing[email]', 'required|email');

                        this.$validator.validate('address-form.billing[email]', this.address.billing.email)
                        .then(isValid => {
                            if (! isValid)
                                return;

                            this.$http.post("{{ route('customer.checkout.exist') }}", {email: this.address.billing.email})
                            .then(response => {
                                this.is_customer_exist = response.data ? 1 : 0;
                                console.log(this.is_customer_exist);

                                if (response.data)
                                    this.$root.hideLoader();
                            })
                            .catch(function (error) {})
                        })
                        .catch(error => {})
                    },

                    loginCustomer: function () {
                        this.$http.post("{{ route('customer.checkout.login') }}", {
                                email: this.address.billing.email,
                                password: this.address.billing.password
                            })
                            .then(response => {
                                if (response.data.success) {
                                    window.location.href = "{{ route('shop.checkout.onepage.index') }}";
                                } else {
                                    window.showAlert(`alert-danger`, this.__('shop.general.alert.danger'), response.data.error);
                                }
                            })
                            .catch(function (error) {})
                    },

                    getOrderSummary: function () {
                        this.$http.get("{{ route('shop.checkout.summary') }}")
                            .then(response => {
                                summaryHtml = Vue.compile(response.data.html)

                                this.summaryComponentKey++;
                                this.reviewComponentKey++;
                            })
                            .catch(function (error) {})
                    },
                    getRates: function () {
                        this.$http.get("{{ route('shop.checkout.render-rates') }}")
                            .then(response => {
                        
                                this.showShippingSection = true;
                                shippingHtml = Vue.compile(response.data.html);
                                this.shippingComponentKey++;
                                this.getOrderSummary();
                            })
                            .catch(function (error) {})
                    },
                    getPaymentMethods: function () {
                        this.$http.get("{{ route('shop.checkout.render-payments') }}")
                            .then(response => {
                        
                                this.showPaymentSection = true;

                                paymentHtml = Vue.compile(response.data.html);
                                paymentMethods = response.data.paymentMethods;

                                this.getOrderSummary();
                            })
                            .catch(function (error) {})
                    },
                    getOrderReview: function () {
                        this.$http.get("{{ route('shop.checkout.render-orderreview') }}")
                            .then(response => {
                                this.showSummarySection = true;
                                reviewHtml = Vue.compile(response.data.html)
                                
                                document.body.style.cursor = 'auto';

                                this.getOrderSummary();
                            })
                            .catch(function (error) {})
                    },
                    saveAddress: async function () {
                        this.disable_button = true;

                        if (this.allAddress.length > 0) {
                            let address = this.allAddress.forEach(address => {
                                if (address.id == this.address.billing.address_id) {
                                    this.address.billing.address1 = [address.address1];

                                    if (address.email) {
                                        this.address.billing.email = address.email;
                                    }

                                    if (address.first_name) {
                                        this.address.billing.first_name = address.first_name;
                                    }

                                    if (address.last_name) {
                                        this.address.billing.last_name = address.last_name;
                                    }
                                }

                                if (address.id == this.address.shipping.address_id) {
                                    this.address.shipping.address1 = [address.address1];

                                    if (address.email) {
                                        this.address.shipping.email = address.email;
                                    }

                                    if (address.first_name) {
                                        this.address.shipping.first_name = address.first_name;
                                    }

                                    if (address.last_name) {
                                        this.address.shipping.last_name = address.last_name;
                                    }
                                }
                            });
                        }

                        this.$http.post("{{ route('shop.checkout.save-address') }}", this.address)
                            .then(response => {
                                this.disable_button = false;
                                this.isPlaceOrderEnabled = true;

                                //console.log(response.data.html);

                                if (this.step_numbers[response.data.jump_to_section] == 2) {
                                    this.showShippingSection = true;
                                    shippingHtml = Vue.compile(response.data.html);
                                } else {
                                    paymentHtml = Vue.compile(response.data.html)
                                }

                                this.completed_step = this.step_numbers[response.data.jump_to_section] + 1;
                                this.current_step = this.step_numbers[response.data.jump_to_section];

                                if (response.data.jump_to_section == "payment") {
                                    this.showPaymentSection = true;
                                    paymentMethods  = response.data.paymentMethods;
                                }

                                shippingMethods = response.data.shippingMethods;

                                this.shippingComponentKey++;

                                this.getOrderSummary();

                                this.$root.hideLoader();
                                //console.log('dd');
                                let shipping_method_selected = document.getElementById("flatrate_flatrate");
                                shipping_method_selected.prop('checked', true);
                                
                            })
                            .catch(error => {
                                this.disable_button = false;
                                this.$root.hideLoader();

                                this.handleErrorResponse(error.response, 'address-form')
                            })
                    },

                    saveShipping: async function () {
                        this.disable_button = true;

                        this.$http.post("{{ route('shop.checkout.save-shipping') }}", {'shipping_method': this.selected_shipping_method})
                            .then(response => {
                                this.$root.hideLoader();
                                this.disable_button = false;
                                this.showPaymentSection = true;

                                paymentHtml = Vue.compile(response.data.html)

                                this.completed_step = this.step_numbers[response.data.jump_to_section] + 1;

                                this.current_step = this.step_numbers[response.data.jump_to_section];

                                paymentMethods = response.data.paymentMethods;

                                if (this.selected_payment_method) {
                                    this.savePayment();
                                }

                                this.getOrderSummary();
                            })
                            .catch(error => {
                                this.disable_button = false;
                                this.$root.hideLoader();
                                this.handleErrorResponse(error.response, 'shipping-form')
                            })
                    },

                    savePayment: async function () {
                        this.disable_button = true;

                        if (this.isCheckPayment) {
                            this.isCheckPayment = false;

                            this.$http.post("{{ route('shop.checkout.save-payment') }}", {'payment': this.selected_payment_method})
                            .then(response => {
                                this.isCheckPayment = true;
                                this.disable_button = false;

                                this.showSummarySection = true;
                                this.$root.hideLoader();

                                reviewHtml = Vue.compile(response.data.html)
                                this.completed_step = this.step_numbers[response.data.jump_to_section] + 1;
                                this.current_step = this.step_numbers[response.data.jump_to_section];

                                document.body.style.cursor = 'auto';

                                this.getOrderSummary();
                            })
                            .catch(error => {
                                this.disable_button = false;
                                this.$root.hideLoader();
                                this.handleErrorResponse(error.response, 'payment-form')
                            });
                        }
                    },

                    placeOrder: async function () {
                        if (this.isPlaceOrderEnabled) {
                            this.disable_button = false;
                            this.isPlaceOrderEnabled = false;

                            this.$root.showLoader();

                            this.$http.post("{{ route('shop.checkout.save-order') }}", {'_token': "{{ csrf_token() }}"})
                            .then(response => {
                                if (response.data.success) {
                                    if (response.data.redirect_url) {
                                        this.$root.hideLoader();
                                        window.location.href = response.data.redirect_url;
                                    } else {
                                        this.$root.hideLoader();
                                        window.location.href = "{{ route('shop.checkout.success') }}";
                                    }
                                }
                            })
                            .catch(error => {
                                this.disable_button = true;
                                this.$root.hideLoader();

                                window.showAlert(`alert-danger`, this.__('shop.general.alert.danger'), "{{ __('shop::app.common.error') }}");
                            })
                        } else {
                            this.disable_button = true;
                        }
                    },

                    handleErrorResponse: function (response, scope) {
                        if (response.status == 422) {
                            serverErrors = response.data.errors;
                            this.$root.addServerErrors(scope)
                        } else if (response.status == 403) {
                            if (response.data.redirect_url) {
                                window.location.href = response.data.redirect_url;
                            }
                        }
                    },

                    shippingMethodSelected: function (shippingMethod) {
                        this.selected_shipping_method = shippingMethod;
                    },

                    paymentMethodSelected: function (paymentMethod) {
                        this.selected_payment_method = paymentMethod;
                    },

                    newBillingAddress: function () {
                        this.new_billing_address = true;
                        this.isPlaceOrderEnabled = false;
                        this.address.billing.address_id = null;
                    },

                    newShippingAddress: function () {
                        this.new_shipping_address = true;
                        this.isPlaceOrderEnabled = false;
                        this.address.shipping.address_id = null;
                    },

                    backToSavedBillingAddress: function () {
                        this.new_billing_address = false;
                        this.validateFormAfterAction()
                    },

                    backToSavedShippingAddress: function () {
                        this.new_shipping_address = false;
                        this.validateFormAfterAction()
                    },

                    validateFormAfterAction: function () {
                        setTimeout(() => {
                            this.validateForm('address-form');
                        }, 0);
                    }
                }
            });

            Vue.component('shipping-section', {
                inject: ['$validator'],

                data: function () {
                    return {
                        templateRender: null,

                        selected_shipping_method: 'free_free',

                        first_iteration : true,
                    }
                },

                staticRenderFns: shippingTemplateRenderFns,

                mounted: function () {
                    this.templateRender = shippingHtml.render;

                    for (var i in shippingHtml.staticRenderFns) {
                        shippingTemplateRenderFns.push(shippingHtml.staticRenderFns[i]);
                    }

                    eventBus.$emit('after-checkout-shipping-section-added');
                },

                render: function (h) {
                    return h('div', [
                        (this.templateRender ?
                            this.templateRender() :
                            '')
                        ]);
                },

                methods: {
                    methodSelected: function () {
                        this.$parent.validateForm('shipping-form');

                        this.$emit('onShippingMethodSelected', this.selected_shipping_method)

                        eventBus.$emit('after-shipping-method-selected', this.selected_shipping_method);
                    }
                }
            })

            Vue.component('payment-section', {
                inject: ['$validator'],

                data: function () {
                    return {
                        templateRender: null,

                        payment: {
                            method: "cashondelivery"
                        },

                        first_iteration : true,
                    }
                },

                staticRenderFns: paymentTemplateRenderFns,

                mounted: function () {
                    this.templateRender = paymentHtml.render;

                    for (var i in paymentHtml.staticRenderFns) {
                        paymentTemplateRenderFns.push(paymentHtml.staticRenderFns[i]);
                    }

                    eventBus.$emit('after-checkout-payment-section-added');
                },

                render: function (h) {
                    return h('div', [
                        (this.templateRender ?
                            this.templateRender() :
                            '')
                        ]);
                },

                methods: {
                    methodSelected: function () {
                        this.$parent.validateForm('payment-form');

                        this.$emit('onPaymentMethodSelected', this.payment)

                        eventBus.$emit('after-payment-method-selected', this.payment);
                    }
                }
            })

            Vue.component('review-section', {
                data: function () {
                    return {
                        error_message: '',
                        templateRender: null,
                    }
                },

                staticRenderFns: reviewTemplateRenderFns,

                render: function (h) {
                    return h(
                        'div', [
                            this.templateRender ? this.templateRender() : ''
                        ]
                    );
                },

                mounted: function () {
                    this.templateRender = reviewHtml.render;

                    for (var i in reviewHtml.staticRenderFns) {
                        reviewTemplateRenderFns[i] = reviewHtml.staticRenderFns[i];
                    }

                    this.$forceUpdate();
                }
            });

            Vue.component('summary-section', {
                inject: ['$validator'],

                staticRenderFns: summaryTemplateRenderFns,

                props: {
                    discount: {
                        default: 0,
                        type: [String, Number],
                    }
                },

                data: function () {
                    return {
                        changeCount: 0,
                        coupon_code: null,
                        error_message: null,
                        templateRender: null,
                        couponChanged: false,
                    }
                },

                mounted: function () {
                    this.templateRender = summaryHtml.render;

                    for (var i in summaryHtml.staticRenderFns) {
                        summaryTemplateRenderFns[i] = summaryHtml.staticRenderFns[i];
                    }

                    this.$forceUpdate();
                },

                render: function (h) {
                    return h('div', [
                        (this.templateRender ?
                            this.templateRender() :
                            '')
                        ]);
                },

                methods: {
                    onSubmit: function () {
                        var this_this = this;
                        const emptyCouponErrorText = "Please enter a coupon code";
                    },

                    changeCoupon: function () {
                        if (this.couponChanged == true && this.changeCount == 0) {
                            this.changeCount++;

                            this.error_message = null;

                            this.couponChanged = false;
                        } else {
                            this.changeCount = 0;
                        }
                    },
                }
            });

        })();
    </script>
@endpush
