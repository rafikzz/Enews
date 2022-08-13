@extends('layouts\front\front-master')

@section('content')
    <div class=" main-bg">
        <div class="container-fluid p-0">
            <div class="text-left iq-breadcrumb-one iq-bg-over black">
                <div class="container __web-inspector-hide-shortcut__">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                                <h2 class="title">
                                    Category
                                </h2>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @isset($categories)
        <section class="iq-blog-section iq-pb-55">
            <div class="container">
                <div class="row">
                    <div class="iq-blog ">
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class=" text-center col-3 pr-2 py-2 ">
                                    <a class="iq-button d-inline-block"
                                        href="{{ url('/category/' . $category->slug) }}"><span>{{ $category->title }}({{ $category->active_news_count }})</span></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset

@endsection
