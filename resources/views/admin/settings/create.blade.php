@extends('layouts.admin.master')
@section('title')
    Setting Management
@endsection
@section('content')
    <div class="row card card-outline card-success ">
        <div class="card-header">
            <h2 class="card-title">Setting</h2>
        </div>
        <div class="card-body col-6">
            <form method="POST" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label class="label" for="contact_information">Contact Information</label>
                        <input type="text" name="contact_information" value="{{ old('contact_information') ?:(isset($setting))? $setting->contact_information :'' }}"
                            class="form-control  @error('contact_information') is-invalid @enderror" minlength="3"
                            placeholder="Enter Contact Information" required>
                        @error('contact_information')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label" for="office_location">Office Location</label>
                        <input type="text" name="office_location" value="{{ old('office_location') ?:(isset($setting))? $setting->office_location:'' }}"
                            class="form-control  @error('office_location') is-invalid @enderror" minlength="3"
                            placeholder="Enter Office Location" required >
                        @error('office_location')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group  d-flex">
                        <div class="col-md-6">
                            <label for="exampleInputFile">Upload Logo</label>
                            <div class="input-group ">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo" id="image" @if(!isset($setting)) required @endif>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img id="preview-image-before-upload" src="{{ (isset($setting))? $setting->logo():asset('image/noimgavialable.png') }}"  width="150">
                        </div>
                    </div>
                    @error('image')
                    <span class=" text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary  mt-3">Save Setting</button>
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
