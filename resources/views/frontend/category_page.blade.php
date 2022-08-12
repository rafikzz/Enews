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
                                    Category:{{ $category->title }}
                                </h2>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @isset($newsList)
        <section class="iq-blog-section iq-pb-55">
            <div class="container">
                <div class="row">
                    <div class="iq-blog text-left ">
                        <div class="row">
                            @foreach ($newsList as $news)
                                <div class="col-lg-4 col-md-6">
                                    @component('frontend.components.news-card', ['news' => $news])
                                    @endcomponent
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        {{ $newsList->links() }}
                    </div>
                </div>
            </div>
        </section>
    @endisset

@endsection
