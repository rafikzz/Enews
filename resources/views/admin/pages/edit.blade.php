@extends('layouts.admin.master')

@section('title')
    Page Management
@endsection
@section('content')
    <div class="row card card-outline card-warning ">
        <div class="card-header">
            <h2 class="card-title ">Edit Page</h2>
            <div class="card-tools">
                <a class="btn btn-primary" href="{{ route('admin.pages.index') }}"> Back</a></i></a>
            </div>
        </div>
        <div class="card-body ">
            <form method="POST" action="{{ route('admin.pages.update', $page->slug) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group">
                        <label class="label" for="title">Page Title</label>
                            <input type="text" name="title" value="{{ old('title') ?: $page->title }}"
                                class="form-control  @error('title') is-invalid @enderror" minlength="3" required>
                        @error('title')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-6  ">
                        <div class="d-flex">
                            <div class="col-md-6 ">
                                <label for="exampleInputFile">Upload Image</label>
                                <div class="input-group ">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img id="preview-image-before-upload"src="{{ $page->image() }}"
                                    width="150">
                            </div>
                        </div>
                        @error('image')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <label for="category_id"> Category</label>
                        <select class="form-select" name="category_id" required>
                            <option selected disabled>--Select Category--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"  {{ ($category->id  === $page->category_id)? 'selected':'' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="brief" class="form-label">Brief</label>
                            <textarea class="form-control @error('brief') is-invalid @enderror" name="brief" id="brief" rows="3" required>{{ old('brief')?:$page->brief }}</textarea>
                        </div>
                        @error('brief')
                        <strong>{{ $message }}</strong>
                    @enderror
                    </div>


                    <div class="form-group">
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="summernote" rows="3" required>{{ old('content')?:$page->content }}</textarea>
                        </div>
                        @error('content')
                            <strong>{{ $message }}</strong>
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
@section('js')
<script type="text/javascript">

    $(document).ready(function (e) {
        bsCustomFileInput.init();

       $('#image').change(function(){

        let reader = new FileReader();

        reader.onload = (e) => {

          $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

       });

    });

    </script>
@endsection
