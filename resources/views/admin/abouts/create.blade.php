@extends('layouts.admin.master')
@section('title')
    About Us Management
@endsection
@section('content')
    <div class="row card card-outline card-success ">
        <div class="card-header">
            <h2 class="card-title">About Us</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.abouts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="label" for="tagline">Tagline</label>
                        <input type="text" name="tagline"
                            value="{{ (old('tagline') ?: isset($about)) ? $about->tagline : '' }}"
                            class="form-control  @error('tagline') is-invalid @enderror" minlength="3"
                            placeholder="Enter Tagline" required>
                        @error('tagline')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group   d-flex">
                            <div class="col-md-6">
                                <label for="exampleInputFile">Upload Image</label>
                                <div class="input-group ">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image"
                                            @if (!isset($about)) required @endif>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img id="preview-image-before-upload"
                                    src="{{ isset($about) ? $about->image() : asset('image/noimgavialable.png') }}"
                                    width="150">
                            </div>
                        </div>
                        @error('image')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="label" for="altimage">Alternate Image Text</label>
                        <input type="text" name="altimage"
                            value="{{ (old('altimage') ?: isset($about)) ? $about->altimage : '' }}"
                            class="form-control  @error('altimage') is-invalid @enderror" minlength="3"
                            placeholder="Enter altimage" required>
                        @error('altimage')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="brief" class="form-label">Brief</label>
                            <textarea class="form-control @error('brief') is-invalid @enderror" name="brief" id="brief" rows="3"
                                required>{{ (old('brief') ?: isset($about)) ? $about->brief : '' }}</textarea>
                        </div>
                        @error('brief')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="summernote" rows="3"
                                required>{{ (old('content') ?: isset($about)) ? $about->content : '' }}</textarea>
                        </div>
                        @error('content')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary  mt-3">Save about</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(e) {
            bsCustomFileInput.init();

            $('#image').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
@endsection
