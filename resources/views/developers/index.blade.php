@extends('layouts.app')
@section('title', 'Developer Contacts')

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
                                    <h4 class="card-title mb-1">Developer Contacts</h4>
                                    <p class="card-title-desc mb-0">View, edit, or delete developer contact entries.</p>
                                </div>
                                <a href="{{ route('developers.create') }}" class="btn btn-success">
                                    <i class="bx bx-plus"></i> Create
                                </a>
                            </div>

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Franchise</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Phone</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($developerContacts->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">
                                                <i class="bx bx-info-circle"></i> No developer contacts found.
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($developerContacts as $contact)
                                            <tr>
                                                <td>{{ $contact->franchise->franchise_name ?? 'N/A' }}</td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->title }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->mobile }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td class="d-flex gap-1">
                                                    <button class="btn btn-sm btn-primary" title="View" data-bs-toggle="modal" data-bs-target="#developerModal{{ $contact->id }}">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                    <a href="{{ route('developers.edit', $contact->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('developers.destroy', $contact->id) }}" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn" title="Delete">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="developerModal{{ $contact->id }}" tabindex="-1" aria-labelledby="developerModalLabel{{ $contact->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content border-0 rounded-4 shadow">
                                                        <div class="modal-header bg-white rounded-top-4">
                                                            <h5 class="modal-title fw-bold" id="developerModalLabel{{ $contact->id }}">
                                                                <i class="bx bx-id-card me-2 text-primary"></i> Developer: {{ $contact->name }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Name</small>
                                                                    <div class="fw-semibold">{{ $contact->name }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Title</small>
                                                                    <div class="fw-semibold">{{ $contact->title }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Phone</small>
                                                                    <div class="fw-semibold">{{ $contact->phone }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Mobile</small>
                                                                    <div class="fw-semibold">{{ $contact->mobile }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Email</small>
                                                                    <div class="fw-semibold">{{ $contact->email }}</div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <small class="text-muted">Corporate Address</small>
                                                                    <div class="fw-semibold">{{ $contact->corporate_address }}</div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <small class="text-muted">Franchise</small>
                                                                    <div class="fw-semibold">{{ $contact->franchise->franchise_name ?? 'N/A' }}</div>
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
                text: "This will permanently delete the developer contact.",
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
