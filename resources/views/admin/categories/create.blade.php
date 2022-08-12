@extends('layouts.admin.master')
@section('title')
    Category Management
@endsection
@section('content')
    <div class="row card card-outline card-success ">
        <div class="card-header">
            <h2 class="card-title">Add Category</h2>
            <div class="card-tools">
                <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back</a></i></a>
            </div>
        </div>
        <div class="card-body col-6">
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label class="label" for="title">Category Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="form-control  @error('title') is-invalid @enderror" minlength="3"
                            placeholder="Enter Title" required>
                        @error('title')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary  mt-3">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
