@extends('layouts.admin.master')
@section('title')
    Gallery Management
@endsection
@section('content')
    <div class="row card card-outline card-success ">
        <div class="card-header">
            <h2 class="card-title">{{ $gallery->title }}</h2>
            <div class="card-tools">
                <a class="btn btn-success pr-2" href="{{ route('admin.subgalleries.create', $gallery->id) }}"> <i
                        class="fa fa-plus"></i></a>
                <a class="btn btn-primary" href="{{ route('admin.galleries.index') }}"> Back</a></i></a>
            </div>
        </div>
        <div class="card-body row">

            @foreach ($gallery->subgalleries as $subgallery)

                <div class="col-3 pt-3 pb-3">
                    <div class="card pt-n1">
                        <img src="{{ $subgallery->image() }}"
                        alt="Image not loaded " class="w-200" height="250">
                        <div class="card-body">
                          <div class="row">
                              <div class="col p-3 pl-3">
                                <form action="{{ route('admin.subgalleries.destroy', $subgallery->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete"><i
                                            class="fa fa-trash-alt"></i></button>
                                </form>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
