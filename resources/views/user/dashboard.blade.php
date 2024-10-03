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

            <div class="card-container row">
                @foreach ($datasets as $dataset)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <img class="image-dataset card-img-top"
                                src="{{ asset('assets/dataset_images/' . ($dataset->image ?? 'default.png')) }}"
                                alt="Dataset Image">

                            <div class="card-body">
                                <h5 class="card-title">{{ $dataset->name }}</h5>
                                <p class="card-text mt-auto">
                                    {{ Str::limit($dataset->description, 72) }}
                                    @if (strlen($dataset->description) > 72)
                                        ... <a href="#" class="see-more" data-id="{{ $dataset->id }}">See More</a>
                                    @endif
                                </p>

                            </div>
                            <a class="view-dataset" href="{{ $dataset->link }}">View
                                Datasets</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>
        </div>
        <div class="transaction-history">
            <div class="container mt-5">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand">Transaction History</a>

                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item me-2">
                                <button class="btn btn-outline-success" type="button" onclick="toggleDateInput()"
                                    data-bs-toggle="tooltip" title="Click to select a date">
                                    <i class="bi bi-calendar"></i> Select Date
                                </button>

                                <input type="date" class="form-control mt-2" id="selectDate" name="selectDate"
                                    style="display: none;">
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-outline-success" type="submit">Filters</button>
                            </li>
                        </ul>
                    </div>
                </nav>
                {{-- transaction table --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Dataset Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr class="bg-light text-dark">
                                    <td>{{ $transaction->transaction_id }}</td>
                                    <td>{{ $transaction->dataset_type }}</td>
                                    <td>
                                        <span
                                            class="badge 
                                            @if ($transaction->status == 'Completed') bg-success 
                                            @elseif ($transaction->status == 'Pending') bg-warning text-dark 
                                            @else bg-danger @endif">
                                            {{ $transaction->status }}
                                        </span>
                                    </td>
                                    <td>${{ number_format($transaction->amount, 2) }}</td>
                                    <td>{{ $transaction->payment_method }}</td>
                                    <td>{{ $transaction->date->format('d M, Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No transactions found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endsection
