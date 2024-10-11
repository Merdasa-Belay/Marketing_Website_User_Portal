@extends('layouts.navbar')

@section('content')
    {{-- css link --}}
    <link rel="stylesheet" href="{{ asset('assets/css/my_dashboard.css') }}">

    <div class="wrapper my-dashboard">
        <div class="all-data-hr container-fluid">
            <div class="hero-heading row g-3">
                <!-- Profile Section -->
                <div class="col-12 col-md-4 d-flex align-items-center">
                    <div class="welcome-profile text-center text-md-start">
                        <p class="welcome">Welcome, <span class="fullname">{{ $user->fullname }}</span></p>
                        <p class="profile-id">Profile ID: {{ $user->profile_id }}</p>
                    </div>
                </div>

                <!-- Total Datasets Section -->
                <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                    <div class="container total text-center">
                        @include('data-svg.dataset-svg')
                        <div class="total-number">
                            <p class="total-dataset">Total Datasets</p>
                            <p class="data-number">{{ $datasetsCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Active Subscriptions Section -->
                <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                    <div class="container response text-center">
                        @include('data-svg.subscription-svg')
                        <div class="active-number">
                            <p class="active-response">Active Subscription</p>
                            <p class="subscription">{{ $subscriptionCount }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="col-12">
        </div>




        <div class="subscribed-dataset">

            <div class="dataset-button">
                <p id="my-subscribes">My Subscribed Datasets</p>
                <button class="subscribe-button btn btn-primary mt-3 mt-md-0">Subscribe to more Datasets</button>
            </div>

            {{-- cards --}}
            @include('layouts.card')




            <hr>
        </div>
        @include('layouts.transaction-table')

    </div>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endsection
