@extends('layouts.navbar')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/my_dashboard.css') }}">

    <div class="container-fluid my-dashboard">
        <div class="all-data-hr">
            <div class="hero-heading row g-3">
                <div class="col-12 col-md-4 d-flex" style="padding: 0">
                    <div class="welcome-profile">
                        <p class="welcome">Welcome, <span class="fullname">{{ $user->fullname }}</span></p>
                        <p class="profile-id">Profile ID: {{ $user->profile_id }}</p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="total">
                        @include('data-svg.dataset-svg')
                        <div class="total-number">
                            <p class="total-dataset">Total Datasets</p>
                            <p class="data-number">{{ $datasetsCount }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="response">
                        @include('data-svg.subscription-svg')
                        <div class="active-number">
                            <p class="active-response">Active Subscription</p>
                            <p class="subscription">{{ $subscriptionCount }}</p>
                        </div>
                    </div>
                </div>
            </div>


            <hr>
        </div>


        <div class="subscribed-dataset">

            <div class="dataset-button">
                <p id="my-subscribes">My Subscribed Datasets</p>
                <button class="subscribe-button btn btn-primary mt-3 mt-md-0">Subscribe to more Datasets</button>
            </div>

            @include('layouts.card')




            <hr>
        </div>
        @include('layouts.transaction-table')

    </div>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endsection
