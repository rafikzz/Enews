@extends('layouts.front.front-master')
@section('content')
    <div class=" main-bg">
        <div class="container-fluid p-0">
            <div class="text-left iq-breadcrumb-one iq-bg-over black">
                <div class="container __web-inspector-hide-shortcut__">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                                <h2 class="title">
                                    About Us
                                </h2>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @isset($about)
        <section class="iq-about-section overview-block-pt">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 align-self-center">
                        <div class="iq-title-box text-left mb-4">
                            <h2 class="iq-title mb-3">{{ $about->tagline }}</h2>
                            <p>{{ $about->brief }}</p>
                        </div>
                        <div class="iq-services-box text-left">
                            {!! $about->content !!}
                        </div>
                    </div>
                </div>
                <div class= "row">
                    <div class="col-lg-12 mb-5 mb-lg-0 text-center">
                        <div class="iq-img">
                            <img loading="lazy" src="{{ $about->image() }}" class="img-fluid w-100" alt="{{ $about->altimage }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset
@endsection
