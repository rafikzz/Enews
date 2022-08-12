@extends('layouts.admin.master')
@section('title')
    Menu Management
@endsection
@section('content')
    <div class="row card card-outline card-success ">
        <div class="card-header">
            <h2 class="card-title">Add Menu</h2>
            <div class="card-tools">
                <a class="btn btn-primary" href="{{ route('admin.menus.index') }}"> Back</a></i></a>
            </div>
        </div>
        <div class="card-body col-6">
            <form method="POST" action="{{ route('admin.menus.store') }}">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label class="label" for="title">Menu Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="form-control  @error('title') is-invalid @enderror" minlength="3"
                            placeholder="Enter Title" required>
                        @error('title')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label" for="link">Menu Link</label>
                        <input type="text" name="link" value="{{ old('link') }}"
                            class="form-control  @error('link') is-invalid @enderror" placeholder="Enter Link" required>
                        @error('link')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="category_id"> Parent Menu</label>
                        <select class="form-select" name="parent_id">
                            <option  value="">No Parent Menu</option>
                            @foreach ($menus as $first)
                                <option value="{{ $first->id }}" >{{ $first->title }}</option>
                                @if ($first->childs->count())
                                    @foreach ($first->childs as $second)
                                        <option value="{{ $second->id }}" >-{{ $second->title }}</option>
                                        @if ($second->childs->count())
                                            @foreach ($second->childs as $third)
                                                <option value="{{ $third->id }}" >--{{ $third->title }}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                        @error('parent_id')
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
