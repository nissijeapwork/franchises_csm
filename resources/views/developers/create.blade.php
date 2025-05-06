@extends('layouts.app')
@section('title', 'Create Developer Contact')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create Developer Contact</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('developers.index') }}">Developer Contacts</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('developers.store') }}">
                @csrf
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
                                                <option value="{{ $franchise->franchise_id }}">{{ $franchise->franchise_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Title</label>
                                        <div class="col-md-10">
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Phone</label>
                                        <div class="col-md-10">
                                            <input type="text" name="phone" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Mobile</label>
                                        <div class="col-md-10">
                                            <input type="text" name="mobile" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Email</label>
                                        <div class="col-md-10">
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Corporate Address</label>
                                    <div class="col-md-10">
                                        <textarea name="corporate_address" rows="3" class="form-control"></textarea>
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
