@extends('layouts.app')
@section('title', 'Edit Resource')

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
                        <h4 class="mb-sm-0 font-size-18">Edit Resource</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('resources.index') }}">Resources</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('resources.update', $resource->resource_id) }}" enctype="multipart/form-data">
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
                                            <option value="">Select Franchise</option>
                                            @foreach($franchises as $franchise)
                                                <option value="{{ $franchise->franchise_id }}"
                                                    {{ $franchise->franchise_id == $resource->franchise_id ? 'selected' : '' }}>
                                                    {{ $franchise->franchise_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Current FDD PDF</label>
                                    <div class="col-md-10">
                                    <div class="col-md-10 d-flex gap-2">
                                        @if($resource->fdd_pdf_url)
                                            <a href="{{ asset('storage/uploads/resources/' . $resource->fdd_pdf_url) }}" target="_blank" class="btn btn-sm btn-info">
                                                <i class="bx bx-link-external"></i> View PDF
                                            </a>
                                            <a href="{{ asset('storage/uploads/resources/' . $resource->fdd_pdf_url) }}" download class="btn btn-sm btn-success">
                                                <i class="bx bx-download"></i> Download PDF
                                            </a>
                                        @else
                                            <span class="text-muted">No PDF uploaded</span>
                                        @endif
                                    </div>

                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Replace FDD PDF</label>
                                    <div class="col-md-10">
                                        <input type="file" name="fdd_pdf_url" class="form-control" accept="application/pdf">
                                        <small class="text-muted">Leave blank to keep current PDF</small>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Franchise Comparisons</label>
                                    <div class="col-md-10">
                                        <textarea name="franchise_comparisons" class="form-control rich-editor" rows="6">{!! $resource->franchise_comparisons !!}</textarea>
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
