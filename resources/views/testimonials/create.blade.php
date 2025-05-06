@extends('layouts.app')
@section('title', 'Create Testimonial')

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
                        <h4 class="mb-sm-0 font-size-18">Create Testimonial</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('testimonials.index') }}">Testimonials</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('testimonials.store') }}">
                @csrf
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
                                                <option value="{{ $franchise->franchise_id }}">{{ $franchise->franchise_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Author Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="author_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Location</label>
                                    <div class="col-md-10">
                                        <input type="text" name="location" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Quote</label>
                                    <div class="col-md-10">
                                        <textarea name="quote" class="form-control rich-editor" rows="5"></textarea>

                                    </div>
                                </div>

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


@endsection
