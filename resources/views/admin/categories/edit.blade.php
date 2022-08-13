@extends('layouts.admin.master')
@section('title')
    Category Management
@endsection
@section('content')
    <div class="row card card-outline card-warning ">
        <div class="card-header">
            <h2 class="card-title ">Edit Category</h2>
            <div class="card-tools">
                <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back</a></i></a>
            </div>
        </div>
        <div class="card-body col-md-6">
            <form method="POST" action="{{ route('admin.categories.update', $category->slug) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group">
                        <label class="label" for="title">Category Title</label>
                            <input type="text" name="title" value="{{ old('title') ?: $category->title }}"
                                class="form-control  @error('title') is-invalid @enderror" minlength="3" required>
                        @error('title')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label" for="order">Category Order</label>
                            <input type="number" step="1" min="0" name="order" value="{{ old('order') ?: $category->order }}"
                                class="form-control  @error('order') is-invalid @enderror"  required>
                        @error('order')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary  mt-3">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
