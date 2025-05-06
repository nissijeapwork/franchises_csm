@extends('layouts.app')
@section('title', 'Performance Metrics')

@section('content')
<script src="https://cdn.tiny.cloud/1/kmrjk6zlppd2lio8fmt5tau5s7ga6pvoddf2ubx4fdwrmal3/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="card-title mb-1">Performance Metrics</h4>
                                    <p class="card-title-desc mb-0">View, edit, or delete franchise performance data.</p>
                                </div>
                                <a href="{{ route('metrics.create') }}" class="btn btn-success">
                                    <i class="bx bx-plus"></i> Create
                                </a>
                            </div>

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Franchise</th>
                                        <th>Units</th>
                                        <th>New Last Year</th>
                                        <th>Growth Score</th>
                                        <th>Turnover Score</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($metrics->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">
                                                <i class="bx bx-info-circle"></i> No performance metrics found.
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($metrics as $metric)
                                            <tr>
                                                <td>{{ $metric->franchise->franchise_name }}</td>
                                                <td>{{ $metric->number_of_units }}</td>
                                                <td>{{ $metric->new_units_opened_last_year }}</td>
                                                <td>{{ number_format($metric->growth_score, 2) }}</td>
                                                <td>{{ number_format($metric->turnover_score, 2) }}</td>
                                                <td class="d-flex gap-1">
                                                    <button class="btn btn-sm btn-primary" title="View" data-bs-toggle="modal" data-bs-target="#metricModal{{ $metric->metric_id }}">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                    <a href="{{ route('metrics.edit', $metric->metric_id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('metrics.destroy', $metric->metric_id) }}" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn" title="Delete">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="metricModal{{ $metric->metric_id }}" tabindex="-1" aria-labelledby="metricModalLabel{{ $metric->metric_id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content border-0 rounded-4 shadow">
                                                        <div class="modal-header bg-white rounded-top-4">
                                                            <h5 class="modal-title fw-bold" id="metricModalLabel{{ $metric->metric_id }}">
                                                                <i class="bx bx-bar-chart me-2 text-primary"></i> {{ $metric->franchise->franchise_name ?? 'N/A' }} Metrics
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Total Units</small>
                                                                    <div class="fw-semibold">{{ $metric->number_of_units }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">New Units Last Year</small>
                                                                    <div class="fw-semibold">{{ $metric->new_units_opened_last_year }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Growth Score</small>
                                                                    <div class="fw-semibold">{{ number_format($metric->growth_score, 2) }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Turnover Score</small>
                                                                    <div class="fw-semibold">{{ number_format($metric->turnover_score, 2) }}</div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <small class="text-muted">Trend Chart Data (JSON)</small>
                                                                    <textarea id="json-display" class="form-control" readonly>
                                                                        {{ $metric->unit_trend_chart_data }}
                                                                    </textarea>
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
                text: "This will permanently delete the performance metric.",
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

<script>
    tinymce.init({
        selector: '#json-display',
        readonly: true,
        menubar: false,
        toolbar: false,
        statusbar: false,
        height: 300,
        content_style: 'body { font-family: monospace; background-color: #f8f9fa; padding: 10px; color: #495057; }',
        setup: function (editor) {
            editor.on('init', function () {
                editor.getContainer().style.borderRadius = '0.375rem'; // rounded
            });
        }
    });
</script>
@endsection
