<link rel="stylesheet" href="{{ asset('assets/css/transaction.css') }}">


{{-- transaction table --}}

<div class="container mt-5 transaction-buttons">
    <div class="transaction-search d-flex justify-content-between align-items-center">
        <p class="transaction mb-0">Transaction History</p>

        <div class="button-group ms-auto">
            <button class="btn btn-custom me-2" type="button">
                <i class="fa-regular fa-calendar"></i> Select dates
            </button>
            <button class="btn btn-custom" type="button">
                <i class="fa fa-filter"></i> Filters
            </button>
        </div>

    </div>


    {{-- transaction table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-head">
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
                    <tr class="bg-light">
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ $transaction->dataset_type }}</td>
                        <td>
                            <span
                                class="badge 
                                    @if ($transaction->status == 'Success') status-success
                                    @elseif ($transaction->status == 'Pending') status-pending
                                    @elseif ($transaction->status == 'Failed') status-failed @endif">
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
