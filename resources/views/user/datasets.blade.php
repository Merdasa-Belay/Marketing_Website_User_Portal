@extends('layouts.navbar')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/datasets.css') }}">

    <div class="container datasets">

        <div>
            <div class="dataset-button">
                <p id="my-subscribes">Datasets</p>
                <a class="all-dataset-button btn btn-primary mt-3 mt-md-0" href="{{ route('dataset') }}">
                    All Datasets
                </a>
                <a class="subscribed-dataset btn btn-primary mt-3 mt-md-0" href="{{ route('dataset') }}">
                    Subscribed Datasets
                </a>
            </div>
        </div>
        <div class="row card-container">

            <!-- Include the card layout and pass the dataset -->
            @include('layouts.card')
        </div>
    </div>
@endsection
