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
                                    Gallery:{{ $gallery->title }}
                                </h2>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @isset($photos)
        <section class="position-relative overview-block-pt iq-pb-40 iq-portfolio-section">
            <img src="{{ asset('images/fancybox/overlay.png') }}" class="overlay-right-bottom" alt="#">
            <img src="{{ asset('images/fancybox/overlay-dot.png') }}" class="overlay-right-bottom-2" alt="#">
            <div class="container">
                <div class="row text-center position-relative">

                    @foreach ($photos as $photo)
                        <div class="col-lg-3 col-md-3">
                            @component('frontend.components.photo', ['photo' => $photo])
                            @endcomponent
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        {{ $photos->links() }}
                    </div>
                </div>
            </div>
        </section>
    @endisset

@endsection
