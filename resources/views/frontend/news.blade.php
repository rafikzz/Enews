@extends('layouts\front\front-master')

@section('content')
    <div class=" main-bg">
        <div class="container-fluid p-0">
            <div class="text-left iq-breadcrumb-one
          iq-bg-over black     ">
                <div class="container __web-inspector-hide-shortcut__">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                                <h2 class="title">
                                    News
                                </h2>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- News Start -->
    @isset($categories)
        @foreach ($categories as $category)
            <section class="iq-pb-55 overview-block-pt res-pt">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="text-left iq-title-box pr-lg-5">
                                <h2 class="iq-title text-uppercase">{{ $category->title }}</h2>
                                <p class="iq-line six"></p>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="btn-container">
                                <a class="iq-button d-inline-block"
                                    href="{{ url('/category/' . $category->slug) }}"><span>More</span><em></em></a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-sm-center">
                        <div class="col-sm-12">
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="false"
                                data-items="3" data-items-laptop="3" data-items-tab="2" data-items-mobile="1"
                                data-items-mobile-sm="1" data-margin="30">
                                @foreach ($category->get_news as $news)
                                    <div class="item">

                                        @component('frontend.components.news-card', ['news' => $news])
                                        @endcomponent
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @endisset

    <!-- News End -->


@endsection
