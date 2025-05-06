@extends('layouts.app')
@section('title', 'Create Franchise')

@section('content')
<!-- Plugins css -->
<link href="<?php echo url('assets')?>/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />

<!-- Place the first <script> tag in your HTML's <head> -->
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
                        <h4 class="mb-sm-0 font-size-18">Create Franchise</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('franchises.index') }}">Franchises</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('franchises.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Franchise Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="franchise_name" id="franchise_name" type="text" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Slug URL</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="slug_url" id="slug_url" type="text" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Upload Logo</label>
                                    <div class="col-md-10">
                                        <div class="dropzone" id="logo-dropzone">  
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                </div>
                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </div>
                                        <input type="hidden" name="logo_url" id="logo_url">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Featured Image</label>
                                    <div class="col-md-10">
                                        <div class="dropzone" id="featured-dropzone">
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted bx bxs-image-add"></i>
                                                </div>
                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </div>
                                        <input type="hidden" name="featured_image" id="featured_image">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Tagline</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="tagline" type="text">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Industry</label>
                                    <div class="col-md-10">
                                    <select class="form-control select2" name="industry_id" required>
                                            <option value="">Select Industry</option>
                                            @foreach($industries as $industry)
                                                <option value="{{ $industry->id }}" {{ $industry->name === 'automotive' ? 'selected' : '' }}>
                                                    {{ $industry->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Founded Year</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="founded_year" type="number" min="1800" max="2099">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Franchising Since</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="franchising_since" type="number" min="1800" max="2099">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">HQ Location</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="hq_location" type="text" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">CEO Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="ceo_name" type="text">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Website URL</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="website_url" type="url">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">YouTube Channel</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="youtube_channel" type="url">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Significant Capital Expenditure Items</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="significant_capital_expenditure_items" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Franchise Agreement Term</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="franchise_agreement_term" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="description_long" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Business Model</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="business_model" rows="3"></textarea>
                                    </div>
                                </div>

                                @php
                                    $booleanFields = [
                                        'investor_executive_model' => 'Investor/Executive Model',
                                        'sub_contractor_model' => 'Sub-Contractor Model',
                                        'keep_my_job' => 'Keep My Job',
                                    ];
                                @endphp

                                @foreach($booleanFields as $field => $label)
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">{{ $label }}</label>
                                        <div class="col-md-10">
                                            <select name="{{ $field }}" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Plugins js -->
<script src="<?php echo url('assets')?>/libs/dropzone/dropzone-min.js"></script>

<!-- Form file upload init js -->
<script src="<?php echo url('assets')?>/js/pages/form-file-upload.init.js"></script>

<script>
    function slugify(text) {
        return text
            .toString()
            .toLowerCase()
            .trim()
            .replace(/[\s\W-]+/g, '-')
            .replace(/^-+|-+$/g, '');
    }

    document.getElementById('franchise_name').addEventListener('input', function() {
        const slug = slugify(this.value);
        document.getElementById('slug_url').value = slug;
    });
</script>

<script>
Dropzone.autoDiscover = false;

const logoDropzone = new Dropzone("#logo-dropzone", {
    url: "{{ route('franchises.upload') }}",
    paramName: "file",
    maxFiles: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function(file, response) {
        document.getElementById('logo_url').value = response.filename;
    },
    removedfile: function(file) {
        document.getElementById('logo_url').value = '';
        file.previewElement.remove();
    }
});

const featuredDropzone = new Dropzone("#featured-dropzone", {
    url: "{{ route('franchises.upload') }}",
    paramName: "file",
    maxFiles: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function(file, response) {
        document.getElementById('featured_image').value = response.filename;
    },
    removedfile: function(file) {
        document.getElementById('featured_image').value = '';
        file.previewElement.remove();
    }
});
</script>

@endsection
