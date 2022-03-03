@extends('shop::layouts.master')
@section('content-wrapper')
    <div class="account-content no-margin velocity-divide-page">
        <div class="mainbanner">
            <div class="top-banner">
                <div class="page-titles">
                    <h1>My Account</h1>
                </div>
            </div>
        </div>
        <div class="account-width row">
            <div class="sidebar profile-page col-lg-3 mt-2">
                @include('shop::customers.account.partials.sidemenu')
            </div>
            <div class="account-layout col-lg-9 pt-5 mt-3">
                @yield('page-detail-wrapper')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>
@endpush