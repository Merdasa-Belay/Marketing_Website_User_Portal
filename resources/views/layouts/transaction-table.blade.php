<link rel="stylesheet" href="{{ asset('assets/css/transaction.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- transaction table --}}

<div class="container mt-5 transaction-buttons">
    <div class="transaction-search d-flex justify-content-between align-items-center">
        <p class="transaction mb-0">Transaction History</p>

        <div class="button-group ms-auto">
            <button class="btn btn-custom me-2" type="button">
                <i class="fa fa-calendar-o"></i> Select dates
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
                    <th scope="col">
                        <input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)">
                    </th>
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
                        <td>
                            <input type="checkbox" class="transaction-checkbox"
                                value="{{ $transaction->transaction_id }}">
                        </td>
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
                        <td colspan="7" class="text-center text-muted">No transactions found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="{{ asset('assets/js/transaction-table.js') }}"></script>



</div>
