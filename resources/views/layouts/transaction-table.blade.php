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
</div>
