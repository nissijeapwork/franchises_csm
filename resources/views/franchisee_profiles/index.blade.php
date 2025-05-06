@extends('layouts.app')
@section('title', 'Franchisee Profiles')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="card-title mb-1">Franchisee Profiles</h4>
                                    <p class="card-title-desc mb-0">View, edit, or delete franchisee profile data.</p>
                                </div>
                                <a href="{{ route('franchisee_profiles.create') }}" class="btn btn-success">
                                    <i class="bx bx-plus"></i> Create
                                </a>
                            </div>

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Franchise</th>
                                        <!-- <th>Ideal Candidate</th> -->
                                        <!-- <th>Training & Support</th> -->
                                        <th>Veteran Discount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($profiles->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                <i class="bx bx-info-circle"></i> No franchisee profiles found.
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($profiles as $profile)
                                            <tr>
                                                <td>{{ $profile->franchise->franchise_name }}</td>
                                                <!-- <td>{{ Str::limit(strip_tags($profile->ideal_candidate_traits), 50) }}</td> -->
                                                <!-- <td>{{ Str::limit(strip_tags($profile->training_support_description), 50) }}</td> -->
                                                <td>
                                                    @if($profile->veteran_discount)
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-secondary">No</span>
                                                    @endif
                                                </td>
                                                <td class="d-flex gap-1">
                                                    <button class="btn btn-sm btn-primary" title="View" data-bs-toggle="modal" data-bs-target="#profileModal{{ $profile->profile_id }}">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                    <a href="{{ route('franchisee_profiles.edit', $profile->profile_id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('franchisee_profiles.destroy', $profile->profile_id) }}" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn" title="Delete">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="profileModal{{ $profile->profile_id }}" tabindex="-1" aria-labelledby="profileModalLabel{{ $profile->profile_id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content border-0 rounded-4 shadow">
                                                        <div class="modal-header bg-white rounded-top-4">
                                                            <h5 class="modal-title fw-bold">
                                                                <i class="bx bx-user-voice me-2 text-primary"></i> {{ $profile->franchise->franchise_name }} Profile
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-4">
                                                                <strong>Ideal Candidate Traits:</strong>
                                                                <div class="text-muted">{!! $profile->ideal_candidate_traits !!}</div>
                                                            </div>
                                                            <hr class="my-3">

                                                            <div class="mb-4">
                                                                <strong>Training & Support:</strong>
                                                                <div class="text-muted">{!! $profile->training_support_description !!}</div>
                                                            </div>
                                                            <hr class="my-3">

                                                            <div class="mb-4">
                                                                <strong>Veteran Discount:</strong>
                                                                <div class="text-muted">{{ $profile->veteran_discount ? 'Yes' : 'No' }}</div>
                                                            </div>
                                                            <hr class="my-3">

                                                            <div class="mb-4">
                                                                <strong>Available States:</strong>
                                                                <div class="text-muted">{!! $profile->available_states !!}</div>
                                                            </div>
                                                            <hr class="my-3">

                                                            <div class="mb-4">
                                                                <strong>Store Opening Support:</strong>
                                                                <div class="text-muted">{!! $profile->store_opening_support_description !!}</div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer bg-light border-0 rounded-bottom-4">
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "This will permanently delete the profile.",
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
