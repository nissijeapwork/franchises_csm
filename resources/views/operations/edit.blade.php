@extends('layouts.app')
@section('title', 'Edit Operation')

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
            <h4 class="mb-sm-0 font-size-18">Edit Operation</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('operations.index') }}">Operations</a></li>
                <li class="breadcrumb-item active">Edit</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <form method="POST" action="{{ route('operations.update', $operation->id) }}">
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
                        <option value="{{ $franchise->franchise_id }}"
                          {{ old('franchise_id', $operation->franchise_id) == $franchise->franchise_id ? 'selected' : '' }}>
                          {{ $franchise->franchise_name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                @foreach ([
                  'day_in_the_life' => 'Day In The Life',
                  'territory_description' => 'Territory Description',
                  'customer_base' => 'Customer Base',
                  'scalability' => 'Scalability',
                  'owner_involvement' => 'Owner Involvement',
                  'recession_strength' => 'Recession Strength',
                  'competition' => 'Competition',
                  'history_narrative' => 'History Narrative',
                  'services_income_streams' => 'Services/Income Streams',
                  'real_estate_description' => 'Real Estate Description'
                ] as $field => $label)
                <div class="mb-3 row">
                  <label class="col-md-2 col-form-label">{{ $label }}</label>
                  <div class="col-md-10">
                    <textarea name="{{ $field }}" class="form-control rich-editor" rows="3">{{ old($field, $operation->$field) }}</textarea>
                  </div>
                </div>
                @endforeach

                <div class="mb-3 row">
                  <label class="col-md-2 col-form-label">Business Hours</label>
                  <div class="col-md-10">
                    <input type="text" name="business_hours" class="form-control" value="{{ old('business_hours', $operation->business_hours) }}">
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-md-2 col-form-label">Number/Type of Employees</label>
                  <div class="col-md-10">
                    <input type="text" name="number_type_employees" class="form-control" value="{{ old('number_type_employees', $operation->number_type_employees) }}">
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-md-2 col-form-label">B2B / B2C</label>
                  <div class="col-md-10">
                    <select name="b2b_or_b2c" class="form-control">
                      <option value="">Select</option>
                      <option value="B2B" {{ old('b2b_or_b2c', $operation->b2b_or_b2c) == 'B2B' ? 'selected' : '' }}>B2B</option>
                      <option value="B2C" {{ old('b2b_or_b2c', $operation->b2b_or_b2c) == 'B2C' ? 'selected' : '' }}>B2C</option>
                    </select>
                  </div>
                </div>

                @foreach ([
                  'immigration_friendly' => 'Immigration Friendly',
                  'veteran_incentives' => 'Veteran Incentives',
                  'home_based' => 'Home Based'
                ] as $field => $label)
                <div class="mb-3 row">
                  <label class="col-md-2 col-form-label">{{ $label }}</label>
                  <div class="col-md-10">
                    <select name="{{ $field }}" class="form-control">
                      <option value="0" {{ old($field, $operation->$field) == 0 ? 'selected' : '' }}>No</option>
                      <option value="1" {{ old($field, $operation->$field) == 1 ? 'selected' : '' }}>Yes</option>
                    </select>
                  </div>
                </div>
                @endforeach

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
