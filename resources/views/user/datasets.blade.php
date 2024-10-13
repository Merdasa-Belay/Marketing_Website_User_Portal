@extends('layouts.navbar')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/datasets.css') }}">

    <div class="container datasets">
        @include('layouts.card')
    </div>
@endsection
