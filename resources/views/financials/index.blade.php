@extends('layouts.app')
@section('title', 'Financials')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="card-title mb-1">Financial Records</h4>
                                    <p class="card-title-desc mb-0">View, edit, or delete financial entries.</p>
                                </div>
                                <a href="{{ route('financials.create') }}" class="btn btn-success">
                                    <i class="bx bx-plus"></i> Create
                                </a>
                            </div>

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Franchise</th>
                                        <th>Cash Required</th>
                                        <!-- <th>Net Worth</th> -->
                                        <th>Investment Range</th>
                                        <!-- <th>Franchise Fee</th> -->
                                        <th>Royalty %</th>
                                        <!-- <th>Ad Fund %</th> -->
                                        <!-- <th>Avg Unit Volume</th> -->
                                        <th>Affiliate Revenue</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($financials->isEmpty())
                                        <tr>
                                            <td colspan="10" class="text-center text-muted">
                                                <i class="bx bx-info-circle"></i> No financial records found.
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($financials as $financial)
                                            <tr>
                                                <td>{{ $financial->franchise->franchise_name }}</td>
                                                <td>${{ number_format($financial->cash_required, 2) }}</td>
                                                <!-- <td>${{ number_format($financial->net_worth_required, 2) }}</td> -->
                                                <td>${{ number_format($financial->total_investment_low, 2) }} - ${{ number_format($financial->total_investment_high, 2) }}</td>
                                                <!-- <td>${{ number_format($financial->franchise_fee, 2) }}</td> -->
                                                <td>{{ number_format($financial->royalty_fee, 2) }}%</td>
                                                <!-- <td>{{ number_format($financial->ad_fund_fee, 2) }}%</td> -->
                                                <!-- <td>${{ number_format($financial->average_unit_volume, 2) }}</td> -->
                                                <td>${{ number_format($financial->affiliate_revenue, 2) }}</td>
                                                <td class="d-flex gap-1">
                                                     <!-- View Button -->
                                                    <button class="btn btn-sm btn-primary" title="View" data-bs-toggle="modal" data-bs-target="#financialModal{{ $financial->financial_id }}">
                                                        <i class="bx bx-show"></i>
                                                    </button>

                                                    <a href="{{ route('financials.edit', $financial->financial_id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('financials.destroy', $financial->financial_id) }}" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn" title="Delete">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                             <!-- Modal -->
                                            <div class="modal fade" id="financialModal{{ $financial->financial_id }}" tabindex="-1" aria-labelledby="financialModalLabel{{ $financial->financial_id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content border-0 rounded-4 shadow">
                                                        <div class="modal-header bg-white rounded-top-4">
                                                            <h5 class="modal-title fw-bold" id="financialModalLabel{{ $financial->financial_id }}">
                                                                <i class="bx bx-bar-chart me-2 text-primary"></i> {{ $financial->franchise->franchise_name ?? 'N/A' }} Financials
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Minimum Liquid Capital Required</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->cash_required, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Minimum Net Worth Required</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->net_worth_required, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Total Investment</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->total_investment_low, 2) }} - ${{ number_format($financial->total_investment_high, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Franchise Fee</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->franchise_fee, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Royalty Fee</small>
                                                                    <div class="fw-semibold">{{ number_format($financial->royalty_fee, 2) }}%</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Ad Fund Fee</small>
                                                                    <div class="fw-semibold">{{ number_format($financial->ad_fund_fee, 2) }}%</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Average Unit Volume</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->average_unit_volume, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Affiliate Revenue</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->affiliate_revenue, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Initial Fee (One Unit)</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->initial_fee_one_unit, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Initial Fee (Two Units)</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->initial_fee_two_units, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Initial Fee (Three Units)</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->initial_fee_three_units, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Referral Fee (Single Unit)</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->referral_fee_single_unit, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Referral Fee (Multi Unit)</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->referral_fee_multi_unit, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Referral Fee Bonus</small>
                                                                    <div class="fw-semibold">{{ $financial->referral_fee_bonus ? 'Yes' : 'No' }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Referral Bonus Amount</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->referral_fee_bonus_amount, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Resale Referral Fee Amount</small>
                                                                    <div class="fw-semibold">${{ number_format($financial->resale_referral_fee_amount, 2) }}</div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer bg-light border-0 rounded-bottom-4 px-4 py-3">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "This will permanently delete the financial record.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection
