@extends('layouts.app')
@section('title', 'Franchise Resources')

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
                                    <h4 class="card-title mb-1">Franchise Resources</h4>
                                    <p class="card-title-desc mb-0">View, edit, or delete additional franchise documents and comparisons.</p>
                                </div>
                                <a href="{{ route('resources.create') }}" class="btn btn-success">
                                    <i class="bx bx-plus"></i> Create
                                </a>
                            </div>

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Franchise</th>
                                        <th>Franchise Comparisons</th>
                                        <th>FDD PDF</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($resources->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">
                                                <i class="bx bx-info-circle"></i> No resources found.
                                            </td>
                                        </tr>
                                    @else
                                    @foreach ($resources as $resource)
                                        <tr>
                                            <td>{{ $resource->franchise->franchise_name ?? 'N/A' }}</td>
                                            <td style="white-space: normal; word-wrap: break-word;">
                                                {!! Str::limit(strip_tags($resource->franchise_comparisons), 500) !!}
                                            </td>


                                            <td>
                                                @if($resource->fdd_pdf_url)
                                                    <div class="row g-1">
                                                        <div class="col-6">
                                                            <a href="{{ asset('storage/uploads/resources/' . $resource->fdd_pdf_url) }}" target="_blank" class="btn btn-sm btn-info w-100">
                                                                <i class="bx bx-link-external"></i> 
                                                            </a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="{{ asset('storage/uploads/resources/' . $resource->fdd_pdf_url) }}" download class="btn btn-sm btn-success w-100">
                                                                <i class="bx bx-download"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span class="text-muted">No PDF Uploaded</span>
                                                @endif
                                            </td>



                                            <td class="d-flex gap-1">
                                                <button class="btn btn-sm btn-primary" title="View"
                                                        data-bs-toggle="modal" data-bs-target="#resourceModal{{ $resource->resource_id }}">
                                                    <i class="bx bx-show"></i>
                                                </button>
                                                <a href="{{ route('resources.edit', $resource->resource_id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="bx bx-pencil"></i>
                                                </a>
                                                <form method="POST" action="{{ route('resources.destroy', $resource->resource_id) }}" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger delete-btn" title="Delete">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="resourceModal{{ $resource->resource_id }}" tabindex="-1" aria-labelledby="resourceModalLabel{{ $resource->resource_id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content border-0 shadow rounded-4">
                                                    <div class="modal-header bg-white rounded-top-4">
                                                        <h5 class="modal-title fw-bold" id="resourceModalLabel{{ $resource->resource_id }}">
                                                            <i class="bx bx-folder me-2 text-primary"></i> Resource for {{ $resource->franchise->franchise_name ?? 'N/A' }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-4">
                                                            <strong>Franchise:</strong>
                                                            <div class="text-muted">{{ $resource->franchise->franchise_name ?? '-' }}</div>
                                                        </div>
                                                        <div class="mb-4">
                                                            <strong>FDD PDF:</strong>
                                                            @if($resource->fdd_pdf_url)
                                                                <div class="row g-1 mt-2">
                                                                    <div class="col-6">
                                                                        <a href="{{ asset('storage/uploads/resources/' . $resource->fdd_pdf_url) }}" target="_blank" class="btn btn-outline-primary btn-sm w-100">
                                                                            <i class="bx bx-show"></i> View PDF
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <a href="{{ asset('storage/uploads/resources/' . $resource->fdd_pdf_url) }}" download class="btn btn-outline-success btn-sm w-100">
                                                                            <i class="bx bx-download"></i> Download PDF
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="text-muted mt-2">No PDF Uploaded</div>
                                                            @endif
                                                        </div>

                                                        <hr>
                                                        <div class="mb-4">
                                                            <strong>Franchise Comparisons:</strong>
                                                            <div class="text-muted mt-3">{!! $resource->franchise_comparisons ?? 'N/A' !!}</div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer bg-light rounded-bottom-4">
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
                text: "This will permanently delete the resource entry.",
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
