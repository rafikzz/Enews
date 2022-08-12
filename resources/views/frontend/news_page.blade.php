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
                                    {{ $news->title }}
                                </h2>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="iq-blog-section overview-block-ptb">
        <div class="col-lg-8 col-sm-12 mt-lg-0 mt-5 center">
            <article id=""
                class=" post type-post status-publish format-standard has-post-thumbnail hentry category-marketing tag-business tag-marketing">
                <div class="iq-blog-box">
                    <div class="iq-blog-image clearfix ">
                        <img src="{{ $news->image() }}" style="" class="img-fluid" alt="qloud">
                    </div>
                    <div class="iq-blog-detail">
                        <div class="iq-blog-meta">
                            <ul class="iq-postdate">
                                <li class="list-inline-item">
                                    <i class="fa fa-calendar mr-2"></i>
                                    <span class="screen-reader-text">Posted on</span> <a href="javascript:void(0)"
                                        rel="bookmark"><time class="entry-date published updated">{{ $news->created_at }}</time></a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-eye mr-2"></i>
                                    <span class="screen-reader-text">Views</span> <a href="javascript:void(0)"
                                        rel="bookmark"><time class="entry-date published updated">{{ $viewCount }}</time></a>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-content">
                            {!! $news->content !!}
                        </div>
                    </div>
                </div>
            </article>
            <!-- #post-## -->
        </div>
    </div>
@endsection
