@extends('layouts.app')

@section('content')
    <div class="container datasets">
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
