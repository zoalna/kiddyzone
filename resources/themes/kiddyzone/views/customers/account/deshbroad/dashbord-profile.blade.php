@extends('shop::customers.account.index')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@push('css')
    <style>
        .account-head {
            height: 50px;
        }
    </style>
@endpush
@section('page-detail-wrapper')
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
                                    <td>{{ __('shop::app.customer.account.profile.fname') }}</td>
                                    <td>{{ $customer->first_name }}</td>
                                </tr>
                                {!! view_render_event('bagisto.shop.customers.account.profile.view.table.gender.after', ['customer' => $customer]) !!}
                                {!! view_render_event('bagisto.shop.customers.account.profile.view.table.date_of_birth.after', ['customer' => $customer]) !!}
                                <tr>
                                    <td>{{ __('shop::app.customer.account.profile.email') }}</td>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('shop::app.customer.account.profile.phone') }}</td>
                                    <td>{{ $customer->phone ?? '-' }}</td>
                                </tr>
                                {!! view_render_event(
                                'bagisto.shop.customers.account.profile.view.table.after', ['customer' => $customer])
                                !!}
                            </tbody>
                        </table>
                    </div>
                    <div class="edit-profile">
                        <a href="#"><img src="image/dashboard/edit-profile.svg"></a>
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
                        <a href="#"><img src="image/dashboard/edit.svg">
                            <span class="text-white">Edit now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    
@endsection