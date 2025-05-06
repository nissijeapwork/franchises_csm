@extends('layouts.app')
@section('title', 'Operations')

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
                                    <h4 class="card-title mb-1">Operations</h4>
                                    <p class="card-title-desc mb-0">View, edit, or delete operational records.</p>
                                </div>
                                <a href="{{ route('operations.create') }}" class="btn btn-success">
                                    <i class="bx bx-plus"></i> Create
                                </a>
                            </div>

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Franchise</th>
                                        <th>Immigration Friendly</th>
                                        <th>Veteran Incentives</th>
                                        <th>B2B / B2C</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($operations->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                <i class="bx bx-info-circle"></i> No operations records found.
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($operations as $operation)
                                            <tr>
                                                <td>{{ $operation->franchise->franchise_name }}</td>
                                                <td>{{ $operation->immigration_friendly ? 'Yes' : 'No' }}</td>
                                                <td>{{ $operation->veteran_incentives ? 'Yes' : 'No' }}</td>
                                                <td>{{ $operation->b2b_or_b2c ?? 'N/A' }}</td>
                                                <td class="d-flex gap-1">
                                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#operationModal{{ $operation->id }}" title="View">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                    <a href="{{ route('operations.edit', $operation->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('operations.destroy', $operation->id) }}" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn" title="Delete">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Operation Modal -->
                                            <div class="modal fade" id="operationModal{{ $operation->id }}" tabindex="-1" aria-labelledby="operationModalLabel{{ $operation->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content border-0 shadow rounded-4">
                                                        <div class="modal-header bg-white border-0 rounded-top-4 px-4 py-3">
                                                            <h5 class="modal-title fw-bold" id="operationModalLabel{{ $operation->id }}">
                                                                <i class="bx bx-bullseye me-2 text-primary"></i> Operational Info – {{ $operation->franchise->franchise_name ?? 'Franchise' }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body px-4 py-3">
                                                            <div class="row g-4">
                                                                <div class="col-md-6"><strong>Immigration Friendly</strong><div>{{ $operation->immigration_friendly ? 'Yes' : 'No' }}</div></div>
                                                                <div class="col-md-6"><strong>Veteran Incentives</strong><div>{{ $operation->veteran_incentives ? 'Yes' : 'No' }}</div></div>
                                                                <div class="col-12"><strong>Day In The Life</strong><div class="text-muted">{!! $operation->day_in_the_life ?? '-' !!}</div></div>
                                                                <div class="col-12"><strong>Territory Description</strong><div class="text-muted">{!! $operation->territory_description ?? '-' !!}</div></div>
                                                                <div class="col-12"><strong>Customer Base</strong><div class="text-muted">{!! $operation->customer_base ?? '-' !!}</div></div>
                                                                <div class="col-12"><strong>Scalability</strong><div class="text-muted">{!! $operation->scalability ?? '-' !!}</div></div>
                                                                <div class="col-12"><strong>Owner Involvement</strong><div class="text-muted">{!! $operation->owner_involvement ?? '-' !!}</div></div>
                                                                <div class="col-12"><strong>Recession Strength</strong><div class="text-muted">{!! $operation->recession_strength ?? '-' !!}</div></div>
 
                                                                <div class="col-md-6"><strong>Business Hours</strong><div>{{ $operation->business_hours ?? '-' }}</div></div>
                                                                <div class="col-12"><strong>Competition</strong><div class="text-muted">{!! $operation->competition ?? '-' !!}</div></div>
                                                                <div class="col-12"><strong>History Narrative</strong><div class="text-muted">{!! $operation->history_narrative ?? '-' !!}</div></div>
                                                                <div class="col-12"><strong>Services / Income Streams</strong><div class="text-muted">{!! $operation->services_income_streams ?? '-' !!}</div></div>
                                                                <div class="col-md-6"><strong>Number / Type of Employees</strong><div class="text-muted">{{ $operation->number_type_employees ?? '-' }}</div></div>
                                                                <div class="col-12"><strong>Real Estate Description</strong><div class="text-muted">{!! $operation->real_estate_description ?? '-' !!}</div></div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer bg-light border-0 rounded-bottom-4 px-4 py-3">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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
        </div>
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
                text: "This will permanently delete the record.",
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
