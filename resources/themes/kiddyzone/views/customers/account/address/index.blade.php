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

    <div class="account-head">
        <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i class="icon icon-menu-back"></i></a></span>
        <span class="account-heading address"><h2>Address Book :-</h2></span>

        

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
                                        <h2>Edit Address Book :-</h2>
                                        <div class="last-button col-12 row">
                                            <div class="col-4">
                                                <div class="manage address bg-red">
                                                    <div class="news-edit text-center">
                                                        <a class="card-link" href="{{ route('customer.address.edit', $address->id) }}">
                                                            <img src="{{ asset('/themes/kiddyzone/assets/images/dashboard/edit-red.svg') }}">
                                                            {{ __('shop::app.customer.account.address.index.edit') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="manage address bg-info">
                                                    <div class="news-edit text-center nice">
                                                        <a class="card-link delete" href="javascript:void(0);" onclick="deleteAddress('{{ __('shop::app.customer.account.address.index.confirm-delete') }}')">
                                                            <img src="{{ asset('/themes/kiddyzone/assets/images/dashboard/delete-cancel.svg') }}">
                                                            {{ __('shop::app.customer.account.address.index.delete') }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <form id="deleteAddressForm" action="{{ route('address.delete', $address->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </div>
                                            <div class="col-4">
                                                @if (! $addresses->isEmpty())
                                                    <span class="account-action">
                                                        <div class="manage add address bg-green">
                                                            <div class="news-edit text-center">
                                                                <a href="{{ route('customer.address.create') }}" class="theme-btn light unset add-items">
                                                                    <img src="{{ asset('/themes/kiddyzone/assets/images/dashboard/add-icon.svg') }}">
                                                                    {{ __('shop::app.customer.account.address.index.add') }}
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

    {!! view_render_event('bagisto.shop.customers.account.address.list.after', ['addresses' => $addresses]) !!}
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
