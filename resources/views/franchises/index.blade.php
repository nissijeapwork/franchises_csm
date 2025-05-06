@extends('layouts.app')
@section('title', 'Franchises')

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
                                        <h4 class="card-title mb-1">Franchises</h4>
                                        <p class="card-title-desc mb-0">View, edit, or delete franchises in the system.</p>
                                    </div>
                                    <a href="{{ route('franchises.create') }}" class="btn btn-success">
                                        <i class="bx bx-plus"></i> Create
                                    </a>
                                </div>


                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <!-- <th>ID</th> -->
                                                <th>Name</th>
                                                <!-- <th>Slug</th> -->
                                                <!-- <th>Logo</th> -->
                                                <!-- <th>Tagline</th> -->
                                                <th>Industry</th>
                                                <th>Founded Year</th>
                                                <!-- <th>Franchising Since</th> -->
                                                <!-- <th>HQ Location</th> -->
                                                <th>CEO Name</th>
                                                <th>Website</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($franchises->isEmpty())
                                                <tr>
                                                    <td colspan="11" class="text-center text-muted">
                                                        <i class="bx bx-info-circle"></i> No franchises found.
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($franchises as $franchise)
                                                <tr>
                                                    <td>{{ $franchise->franchise_name }}</td>
                                                    <td>{{ $franchise->industry->name ?? 'N/A' }}</td>
                                                    <td>{{ $franchise->founded_year }}</td>
                                                    <!-- <td>{{ $franchise->franchising_since }}</td> -->
                                                    <!-- <td>{{ $franchise->hq_location }}</td> -->
                                                    <td>{{ $franchise->ceo_name }}</td>
                                                    <td><a href="{{ $franchise->website_url }}" target="_blank">Visit</a></td>
                                                    <td class="d-flex gap-1">
                                                        <button class="btn btn-sm btn-primary" title="View"
                                                                data-bs-toggle="modal" data-bs-target="#franchiseModal{{ $franchise->franchise_id }}">
                                                            <i class="bx bx-show"></i>
                                                        </button>
                                                        <a href="{{ route('franchises.edit', $franchise->franchise_id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="bx bx-pencil"></i>
                                                        </a>
                                                        <form method="POST" action="{{ route('franchises.destroy', $franchise->franchise_id) }}" class="d-inline delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger delete-btn" title="Delete">
                                                                <i class="bx bx-trash"></i>
                                                            </button>
                                                        </form>

                                                    </td>
                                                </tr>

                                            <!-- Franchise Detail Modal -->
                                            <div class="modal fade" id="franchiseModal{{ $franchise->franchise_id }}" tabindex="-1" aria-labelledby="franchiseModalLabel{{ $franchise->franchise_id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content border-0 shadow-lg rounded-4">
                                                        <div class="modal-header bg-white border-0 rounded-top-4 px-4 py-3">
                                                            <h5 class="modal-title fw-bold" id="franchiseModalLabel{{ $franchise->franchise_id }}">
                                                                <i class="bx bx-store-alt me-2 text-primary"></i> {{ $franchise->franchise_name }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body px-4 py-3">
                                                            <div class="row align-items-center g-4">
                                                                <div class="col-md-4 text-center">
                                                                    @if($franchise->logo_url)
                                                                        <img src="{{ asset('storage/uploads/' . $franchise->logo_url) }}" class="img-fluid rounded-3 shadow-sm" style="max-height: 160px;" alt="Logo">
                                                                    @else
                                                                        <img src="{{ asset('images/default-logo.png') }}" class="img-fluid rounded-3 shadow-sm" style="max-height: 160px;" alt="No Logo">
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-8">
                                                                    <div class="row g-3">
                                                                        <div class="col-12">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-2 text-center">
                                                                                    <i class="bx bxs-quote-left text-muted fs-3"></i>
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    <small class="text-muted">Tagline</small>
                                                                                    <div class="fst-italic fw-semibold">{{ $franchise->tagline ?? '-' }}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <small class="text-muted">Industry</small>
                                                                            <div class="fw-semibold">{{ $franchise->industry->name ?? 'N/A' }}</div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <small class="text-muted">CEO Name</small>
                                                                            <div class="fw-semibold">{{ $franchise->ceo_name ?? '-' }}</div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <small class="text-muted">Founded Year</small>
                                                                            <div class="fw-semibold">{{ $franchise->founded_year ?? '-' }}</div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <small class="text-muted">Franchising Since</small>
                                                                            <div class="fw-semibold">{{ $franchise->franchising_since ?? '-' }}</div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <small class="text-muted">HQ Location</small>
                                                                            <div class="fw-semibold">{{ $franchise->hq_location ?? '-' }}</div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <small class="text-muted">Franchise Agreement Term</small>
                                                                            <div class="fw-semibold">{!! $franchise->franchise_agreement_term ?? '-'!!}</div>
                                                                        </div>

                                                                                                        <div class="col-sm-6">
                                                                            <small class="text-muted">Website</small>
                                                                            <div>
                                                                                @if($franchise->website_url)
                                                                                    <a href="{{ $franchise->website_url }}" target="_blank" class="fw-semibold text-primary text-decoration-none">
                                                                                        {{ $franchise->website_url }}
                                                                                    </a>
                                                                                @else
                                                                                    <span class="text-muted">No Website</span>
                                                                                @endif
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <small class="text-muted">YouTube Channel</small>
                                                                            <div>
                                                                                @if($franchise->youtube_channel)
                                                                                    <a href="{{ $franchise->youtube_channel }}" target="_blank" class="fw-semibold text-primary text-decoration-none">
                                                                                        YouTube
                                                                                    </a>
                                                                                @else
                                                                                    <span class="text-muted">N/A</span>
                                                                                @endif
                                                                            </div>
                                                                        </div>  

                                                                        <!-- <div class="col-12">
                                                                            <small class="text-muted">Slug URL</small>
                                                                            <div class="fw-semibold text-muted">{{ $franchise->slug_url }}</div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @if($franchise->description_long)
                                                                <hr class="my-4">
                                                                <h6 class="fw-bold">Description</h6>
                                                                <p class="text-muted mb-0">{!! $franchise->description_long !!}</p>
                                                            @endif

                                                            @if($franchise->significant_capital_expenditure_items)
                                                                <hr class="my-4">
                                                                <h6 class="fw-bold">Significant Capital Expenditures</h6>
                                                                <p class="text-muted mb-0">{!! $franchise->significant_capital_expenditure_items !!}</p>
                                                            @endif

                                                            @if($franchise->business_model)
                                                            <hr class="my-4">
                                                            <h6 class="fw-bold">Business Model</h6>
                                                            <p class="text-muted mb-0">{!! $franchise->business_model ?? '-' !!}</p>
                                                            @endif

                                                            <hr class="my-4">
                                                            <div class="row mt-4">
                                                                <div class="col-sm-4">
                                                                    <small class="text-muted">Investor/Executive Model</small>
                                                                    <div class="fw-semibold">{{ $franchise->investor_executive_model ? 'Yes' : 'No' }}</div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <small class="text-muted">Sub-Contractor Model</small>
                                                                    <div class="fw-semibold">{{ $franchise->sub_contractor_model ? 'Yes' : 'No' }}</div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <small class="text-muted">Keep My Job</small>
                                                                    <div class="fw-semibold">{{ $franchise->keep_my_job ? 'Yes' : 'No' }}</div>
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
                <!-- End Page-content -->


            </div>
            <!-- end main content-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "This will permanently delete the franchise.",
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