@extends('layouts.navbar')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/datasets.css') }}">

    <div class="container datasets">
        <div class="row card-container">
            @foreach ($datasets as $dataset)
                <!-- Include the card layout and pass the dataset -->
                @include('layouts.card', ['dataset' => $dataset])
            @endforeach
        </div>
    </div>
@endsection
