@extends('layouts\front\front-master')

@section('content')
    @isset($banner)
        @component('frontend.components.banner', ['banner' => $banner])
        @endcomponent
    @endisset
    {{-- <!-- Service Start -->
<div class="position-relative overview-block-pt iq-pb-70 iq-investor">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 wow fadeIn">
                <div class="text-left iq-title-box">
                    <h2 class="iq-title text-uppercase pr-lg-5">Service for Creative Agency Investor</h2>
                    <p class="iq-line one"></p>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 wow fadeIn">
                <div class="btn-container">
                    <a class="iq-button d-inline-block" href="services.html"><span>Click
                            Here</span><em></em></a>
                </div>
            </div>
        </div>
        <div class="row text-center position-relative">
            <div class="col-lg-3 col-md-6 wow fadeIn">
                <div class="iq-service-style1 text-left">
                    <div class="iq-iconbg">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                    </div>
                    <div class="iq-image">
                        <img alt="#" src="images/fancy-pattern.png">
                    </div>
                    <div class="iq-content">
                        <div class="iq-title">
                            <h4>Digital Advice</h4>
                        </div>
                        <p class="m-0">Contrary to popular belief, Lorem Ipsum is not simply.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn">
                <div class="iq-service-style1 text-left">
                    <div class="iq-iconbg">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="iq-image">
                        <img alt="#" src="images/fancy-pattern.png">
                    </div>
                    <div class="iq-content">
                        <div class="iq-title">
                            <h4>Leadership</h4>
                        </div>
                        <p class="m-0">Contrary to popular belief, Lorem Ipsum is not simply.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn">
                <div class="iq-service-style1 white-bg text-left">
                    <div class="iq-iconbg">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                    </div>
                    <div class="iq-image">
                        <img alt="#" src="images/fancy-pattern.png">
                    </div>
                    <div class="iq-content">
                        <div class="iq-title">
                            <h4>Improvement</h4>
                        </div>
                        <p class="m-0">Contrary to popular belief, Lorem Ipsum is not simply.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn">
                <div class="iq-service-style1 white-bg text-left">
                    <div class="iq-iconbg">
                        <i class="fa fa-object-group" aria-hidden="true"></i>
                    </div>
                    <div class="iq-image">
                        <img alt="#" src="images/fancy-pattern.png">
                    </div>
                    <div class="iq-content">
                        <div class="iq-title">
                            <h4>Finance management</h4>
                        </div>
                        <p class="m-0">Contrary to popular belief, Lorem Ipsum is not simply.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Service End --> --}}

    <!-- News Start -->
    @isset($newsList)
        <section class="iq-pb-55 overview-block-pt res-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="text-left iq-title-box pr-lg-5">
                            <h2 class="iq-title text-uppercase">News</h2>
                            <p class="iq-line six"></p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="btn-container">
                            <a class="iq-button d-inline-block" href="{{ url('/news') }}"><span>More</span><em></em></a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-sm-center">
                    <div class="col-sm-12">
                        <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="false"
                            data-items="3" data-items-laptop="3" data-items-tab="2" data-items-mobile="1"
                            data-items-mobile-sm="1" data-margin="30">
                            @foreach ($newsList as $news)
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
    @endisset

    <!-- News End -->

    <!-- Gallery Start -->
    @isset($galleries)
        <section class="position-relative overview-block-pt iq-pb-40 iq-portfolio-section">
            <img src="{{ asset('images/fancybox/overlay.png') }}" class="overlay-right-bottom" alt="#">
            <img src="{{ asset('images/fancybox/overlay-dot.png') }}" class="overlay-right-bottom-2" alt="#">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 wow fadeIn">
                        <div class="text-left iq-title-box pr-lg-5">
                            <h2 class="iq-title text-uppercase">Galleries</h2>
                            <p class="iq-line two"></p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 wow fadeIn">
                        <div class="btn-container">
                            <a class="iq-button d-inline-block" href="{{ url('/gallery') }}"><span>Explore
                                    More</span><em></em></a>
                        </div>
                    </div>
                </div>
                <div class="row text-center position-relative">

                    @foreach ($galleries as $gallery)
                    <div class="col-lg-6 col-md-6 wow fadeIn">
                        @component('frontend.components.gallery', ['gallery' => $gallery])
                        @endcomponent
                    </div>
                    @endforeach


                </div>
            </div>
        </section>
    @endisset

    <!-- Gallery End -->



@endsection
