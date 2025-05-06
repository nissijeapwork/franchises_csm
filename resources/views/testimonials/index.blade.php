@extends('layouts.app')
@section('title', 'Testimonials')

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
                                    <h4 class="card-title mb-1">Testimonials</h4>
                                    <p class="card-title-desc mb-0">View, edit, or delete franchise testimonials.</p>
                                </div>
                                <a href="{{ route('testimonials.create') }}" class="btn btn-success">
                                    <i class="bx bx-plus"></i> Create
                                </a>
                            </div>

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Franchise</th>
                                        <th>Author</th>
                                        <th>Location</th>
                                        <!-- <th>Quote</th> -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($testimonials->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                <i class="bx bx-info-circle"></i> No testimonials found.
                                            </td>
                                        </tr>
                                    @else
                                    @foreach ($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->franchise->franchise_name }}</td>
                                            <td>{{ $testimonial->author_name }}</td>
                                            <td>{{ $testimonial->location }}</td>
                                            <td class="d-flex gap-1">
                                                <button class="btn btn-sm btn-primary" title="View" data-bs-toggle="modal" data-bs-target="#testimonialModal{{ $testimonial->testimonial_id }}">
                                                    <i class="bx bx-show"></i>
                                                </button>

                                                <a href="{{ route('testimonials.edit', $testimonial->testimonial_id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="bx bx-pencil"></i>
                                                </a>

                                                <form method="POST" action="{{ route('testimonials.destroy', $testimonial->testimonial_id) }}" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger delete-btn" title="Delete">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="testimonialModal{{ $testimonial->testimonial_id }}" tabindex="-1" aria-labelledby="testimonialModalLabel{{ $testimonial->testimonial_id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content border-0 rounded-4 shadow">
                                                    <div class="modal-header bg-white rounded-top-4">
                                                        <h5 class="modal-title fw-bold" id="testimonialModalLabel{{ $testimonial->testimonial_id }}">
                                                            <i class="bx bx-message-square-dots me-2 text-primary"></i>
                                                            Testimonial by {{ $testimonial->author_name }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <strong>Franchise:</strong>
                                                            <div class="text-muted">{{ $testimonial->franchise->franchise_name }}</div>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <strong>Location:</strong>
                                                            <div class="text-muted">{{ $testimonial->location }}</div>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <strong>Quote:</strong>
                                                            <div class="text-muted">{!! $testimonial->quote !!}</div>
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
                text: "This will permanently delete the testimonial.",
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
