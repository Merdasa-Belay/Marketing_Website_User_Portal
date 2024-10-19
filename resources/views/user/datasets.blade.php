@extends('layouts.navbar')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/datasets.css') }}">

    <div class="container datasets">
        <div class="row justify-content-center mb-3">
            <div class="col-auto">
                <a href="{{ route('dataset') }}" class="btn btn-primary {{ request()->routeIs('dataset') ? 'active' : '' }}">
                    All Datasets
                </a>
            </div>
            <div class="col-auto">
                <a href="{{ route('dataset.subscribed') }}"
                    class="btn btn-secondary {{ request()->routeIs('dataset.subscribed') ? 'active' : '' }}">
                    Subscribed Datasets
                </a>
            </div>
        </div>


        <div class="row card-container">
            @if ($datasets->isEmpty())
                <p>{{ $isSubscribed ? 'You have not subscribed to any datasets yet.' : 'No datasets available.' }}</p>
            @else
                <!-- Include the card layout, pass the dataset -->
                @include('layouts.card')

                <!-- Display pagination links if paginated -->
                @if (!$isSubscribed)
                    <div class="pagination-container">
                        {{ $datasets->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
