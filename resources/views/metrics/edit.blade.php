@extends('layouts.app')
@section('title', 'Edit Performance Metrics')

@section('content')
<script src="https://cdn.tiny.cloud/1/kmrjk6zlppd2lio8fmt5tau5s7ga6pvoddf2ubx4fdwrmal3/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: [
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
  });
</script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Performance Metrics</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('metrics.index') }}">Metrics</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('metrics.update', $metric->metric_id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Franchise</label>
                                    <div class="col-md-10">
                                        <select name="franchise_id" class="form-control" required>
                                            <option value="">Select a franchise</option>
                                            @foreach($franchises as $franchise)
                                                <option value="{{ $franchise->franchise_id }}" {{ $franchise->franchise_id == $metric->franchise_id ? 'selected' : '' }}>
                                                    {{ $franchise->franchise_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Number of Units</label>
                                    <div class="col-md-10">
                                        <input type="number" name="number_of_units" class="form-control" value="{{ $metric->number_of_units }}" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">New Units Opened Last Year</label>
                                    <div class="col-md-10">
                                        <input type="number" name="new_units_opened_last_year" class="form-control" value="{{ $metric->new_units_opened_last_year }}" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Growth Score</label>
                                    <div class="col-md-10">
                                        <input type="number" step="0.01" name="growth_score" class="form-control" value="{{ $metric->growth_score }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Turnover Score</label>
                                    <div class="col-md-10">
                                        <input type="number" step="0.01" name="turnover_score" class="form-control" value="{{ $metric->turnover_score }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Unit Trend Chart Data (JSON)</label>
                                    <div class="col-md-10">
                                        <textarea name="unit_trend_chart_data" rows="4" class="form-control">{{ $metric->unit_trend_chart_data }}</textarea>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
