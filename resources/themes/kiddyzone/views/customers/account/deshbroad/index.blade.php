@extends('shop::customers.account.index')

@section('page_title')
    {{ __('shop::app.customer.account.address.index.page-title') }}
@endsection

@section('page-detail-wrapper')
        
    @if ($addresses->isEmpty())

        <a href="{{ route('customer.address.create') }}" class="theme-btn light unset address-button">

            {{ __('shop::app.customer.account.address.index.add') }}
        </a>
    @endif
    <div class="profile-dashbord">
        <div class="account-head mb-0">
            <span class="back-icon">
                <a href="{{ route('customer.account.index') }}">
                    <i class="icon icon-menu-back"></i>
                </a>
            </span>
            <span class="account-heading custome">
                <span>Account Information</span>
            </span>
        </div>
        <div class="account-table-content profile-page-content">
            <div class="row information">
                <div class="col-md-6">
                    <div class="info-content content-box">
                        <h2>Information :-</h2>
                        <div class="table">
                            <table>
                                <tbody>
                                    {!! view_render_event(
                                    'bagisto.shop.customers.account.profile.view.table.before', ['customer' => $customer])
                                    !!}
                                    <tr>
                                        <td>{{ __('shop::app.customer.account.profile.fname') }}:</td>
                                        <td>{{ $customer->first_name }}</td>
                                    </tr>
                                    {!! view_render_event('bagisto.shop.customers.account.profile.view.table.gender.after', ['customer' => $customer]) !!}
                                    {!! view_render_event('bagisto.shop.customers.account.profile.view.table.date_of_birth.after', ['customer' => $customer]) !!}
                                    <tr>
                                        <td>{{ __('shop::app.customer.account.profile.email') }}:</td>
                                        <td>{{ $customer->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('shop::app.customer.account.profile.phone') }}:</td>
                                        <td>{{ $customer->phone ?? '-' }}</td>
                                    </tr>
                                    {!! view_render_event(
                                    'bagisto.shop.customers.account.profile.view.table.after', ['customer' => $customer])
                                    !!}
                                </tbody>
                            </table>
                        </div>
                        <div class="edit-profile">
                            <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/dashboard/edit-profile.svg') }}"></a>
                            <span>Edit and Change</span>
                            <span>
                                <a href="{{ route('customer.profile.change-password') }}" class="text-red">Password</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter bg-red">
                        <h2 class="text-white">Newsletter</h2>
                        <p class="text-white">You aren't subscribed to our newsletter</p>
                        <div class="news-edit">
                            <a href="#"><img src="{{ asset('/themes/kiddyzone/assets/images/dashboard/edit.svg') }}">
                                <span class="text-white">Edit now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="address-dashbord">
        <div class="account-head">
            <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i class="icon icon-menu-back"></i></a></span>
            <span class="account-heading address"><h2>Address Book :-</h2></span>
            <div class="account-table-content">
                @if ($addresses->isEmpty())
                    <div>{{ __('shop::app.customer.account.address.index.empty') }}</div>
                @else
                    <div class="address-holder col-12 no-padding">
                        @foreach ($addresses as $address)
                            <div class="col-lg-12 col-md-12">
                                <div class="card nice">
                                    <div class="card-body">
                                        <div class="address-book">
                                            <div class="last-button col-12 row">
                                                <div class="col-5 col">
                                                    <div class="manage address bg-red">
                                                        <div class="news-edit text-center"><a href="{{ route('customer.address.index') }}"><img src="{{ asset('/themes/kiddyzone/assets/images/dashboard/edit-red.svg') }}"><span class="text-white">Manage Address</span></a></div>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    @if (! $addresses->isEmpty())
                                                        <span class="account-action">
                                                            <div class="manage add address bg-green">
                                                                <div class="news-edit text-center">
                                                                    <a href="{{ route('customer.address.create') }}" class="theme-btn light unset add-items">
                                                                        <img src="{{ asset('/themes/kiddyzone/assets/images/dashboard/add-icon.svg') }}">
                                                                        <span>{{ __('shop::app.customer.account.address.index.add') }}</span>
                                                                        
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="horizontal-rule"></div>
        </div>
        {!! view_render_event('bagisto.shop.customers.account.address.list.before', ['addresses' => $addresses]) !!}
            <div class="account-table-content">
                @if ($addresses->isEmpty())
                    <div>{{ __('shop::app.customer.account.address.index.empty') }}</div>
                @else
                    <div class="address-holder col-12 no-padding">
                        @foreach ($addresses as $address)
                            <div class="col-lg-12 col-md-12">
                                <div class="card nice">
                                    <div class="card-body">
                                    <h3>Default Billing Address :-</h3>
                                        <h5 class="card-title fw6">{{ $address->first_name }} {{ $address->last_name }}</h5>
                                        <ul type="none">
                                            {{-- <li>{{ $address->company_name }}</li> --}}
                                            <li>{{ $address->address1 }}</li>
                                            <li>{{ $address->city }}</li>
                                            <li>{{ $address->state }}</li>
                                            <li>{{ core()->country_name($address->country) }} {{ $address->postcode }}</li>
                                            <li>
                                                {{ __('shop::app.customer.account.address.index.contact') }} : {{$address->phone }}
                                            </li>
                                        </ul>
                                        <div class="address-book">
                                            <div class="edit-profile">
                                            <a href="{{ route('customer.address.edit', $address->id) }}">
                                                <img src="{{ asset('/themes/kiddyzone/assets/images/dashboard/edit-profile.svg') }}"></a><span><a href="{{ route('customer.address.edit', $address->id) }}">Edit Address</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        {!! view_render_event('bagisto.shop.customers.account.address.list.after', ['addresses' => $addresses]) !!}
    </div>
    <div class="order-dashbord">
        <div class="account-head mb-10">
            <span class="back-icon">
                <a href="{{ route('customer.account.index') }}">
                    <i class="icon icon-menu-back"></i>
                </a>
            </span>
            <span class="account-heading">
                {{ __('shop::app.customer.account.order.index.title') }}
            </span>
        </div>
        {!! view_render_event('bagisto.shop.customers.account.orders.list.before') !!}
            <div class="account-items-list">
                <div class="account-table-content">
                    {!! app('Webkul\Shop\DataGrids\OrderDataGrid')->render() !!}
                </div>
            </div>
        {!! view_render_event('bagisto.shop.customers.account.orders.list.after') !!}
    </div>
@endsection

@push('scripts')
    <script>
        function deleteAddress(message) {
            if (! confirm(message)) {
                return;
            }

            $('#deleteAddressForm').submit();
        }
    </script>
@endpush

@if ($addresses->isEmpty())
    <style>
        a#add-address-button {
            position: absolute;
            margin-top: 92px;
        }

        .address-button {
            position: absolute;
            z-index: 1 !important;
            margin-top: 110px !important;
        }
    </style>
@endif
