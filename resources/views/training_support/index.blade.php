@extends('layouts.app')
@section('title', 'Training Support')

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
                                    <h4 class="card-title mb-1">Training Support</h4>
                                    <p class="card-title-desc mb-0">View, edit, or delete training support entries.</p>
                                </div>
                                <a href="{{ route('training_support.create') }}" class="btn btn-success">
                                    <i class="bx bx-plus"></i> Create
                                </a>
                            </div>

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Franchise</th>
                                        <th>Training/Support</th>
                                        <!-- <th>Technology Tools</th> -->
                                        <!-- <th>Lease Negotiation</th> -->
                                        <!-- <th>Staff Recruiting</th> -->
                                        <!-- <th>Digital Marketing</th> -->
                                        <!-- <th>Call Center</th> -->
                                        <!-- <th>Site Selection</th> -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($trainingSupports->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center text-muted">
                                                <i class="bx bx-info-circle"></i> No training support records found.
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($trainingSupports as $support)
                                            <tr>
                                                <td>{{ $support->franchise->franchise_name }}</td>
                                                <td>{{ Str::limit(strip_tags($support->training_support), 50) }}</td>
                                                <!-- <td>{{ Str::limit(strip_tags($support->technology_tools), 50) }}</td>
                                                <td>{{ $support->lease_negotiation_assistance ? 'Yes' : 'No' }}</td>
                                                <td>{{ $support->staff_recruiting_assistance ? 'Yes' : 'No' }}</td>
                                                <td>{{ $support->digital_marketing_assistance ? 'Yes' : 'No' }}</td>
                                                <td>{{ $support->call_center_assistance ? 'Yes' : 'No' }}</td>
                                                <td>{{ $support->site_selection_assistance ? 'Yes' : 'No' }}</td> -->
                                                <td class="d-flex gap-1">
                                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#trainingSupportModal{{ $support->id }}" title="View">
                                                        <i class="bx bx-show"></i>
                                                    </button>

                                                    <a href="{{ route('training_support.edit', $support->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('training_support.destroy', $support->id) }}" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn" title="Delete">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Training Support Modal -->
                                            <div class="modal fade" id="trainingSupportModal{{ $support->id }}" tabindex="-1" aria-labelledby="trainingSupportModalLabel{{ $support->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content border-0 shadow rounded-4">
                                                        <div class="modal-header bg-white border-0 rounded-top-4 px-4 py-3">
                                                            <h5 class="modal-title fw-bold" id="trainingSupportModalLabel{{ $support->id }}">
                                                                <i class="bx bx-support me-2 text-primary"></i> Training & Support – {{ $support->franchise->franchise_name ?? 'Franchise' }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body px-4 py-3">
                                                            <div class="row g-4">
                                                                <div class="col-12">
                                                                    <strong>Training & Support Description</strong>
                                                                    <div class="fw-normal text-muted mt-3">{!! $support->training_support ?? '-' !!}</div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <strong>Technology Tools</strong>
                                                                    <div class="fw-normal text-muted mt-3">{!! $support->technology_tools ?? '-' !!}</div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <small class="text-muted">Lease Negotiation Assistance</small>
                                                                    <div class="fw-semibold">{{ $support->lease_negotiation_assistance ? 'Yes' : 'No' }}</div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <small class="text-muted">Staff Recruiting Assistance</small>
                                                                    <div class="fw-semibold">{{ $support->staff_recruiting_assistance ? 'Yes' : 'No' }}</div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <small class="text-muted">Digital Marketing Assistance</small>
                                                                    <div class="fw-semibold">{{ $support->digital_marketing_assistance ? 'Yes' : 'No' }}</div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <small class="text-muted">Call Center Assistance</small>
                                                                    <div class="fw-semibold">{{ $support->call_center_assistance ? 'Yes' : 'No' }}</div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <small class="text-muted">Site Selection Assistance</small>
                                                                    <div class="fw-semibold">{{ $support->site_selection_assistance ? 'Yes' : 'No' }}</div>
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
                text: "This will permanently delete the training support record.",
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
