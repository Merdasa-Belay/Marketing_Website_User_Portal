@extends('layouts.navbar')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/datasets.css') }}">

    <div class="container datasets">

        <div class="row card-container justify-content-center">
            <a href="{{ route('dataset') }}" class="btn btn-primary {{ request()->routeIs('dataset') ? 'active' : '' }}">
                All Datasets
            </a>
            <a href="{{ route('dataset') }}" class="btn btn-secondary {{ request()->routeIs('dataset') ? 'active' : '' }}">
                Subscribed Datasets
            </a>
        </div>


        <div class="row card-container">
            @if ($subscribedDatasets->isEmpty())
                <p>You have not subscribed to any datasets yet.</p>
            @else
                <!-- Include the card layout and pass the subscribed dataset -->
                @include('layouts.card')
            @endif
        </div>
    </div>
@endsection
