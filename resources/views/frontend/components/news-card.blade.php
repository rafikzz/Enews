<div class="iq-blog-box">
    <div class="iq-blog-image clearfix">
        <img src="{{ $news->image() }}" alt="#">
    </div>
    <div class="iq-blog-detail">
        <div class="blog-title">
            <a href="blog-details.html">
                <h4 class="mb-3">{{ $news->title }}</h4>
            </a>
        </div>
        <p class="iq-desc">{{ $news->brief }}</p>
        <div class="blog-footer">
            <div class="iq-blog-meta">
                <ul class="iq-postdate">
                    <li class="list-inline-item">
                        <i class="fa fa-calendar mr-1" aria-hidden="true"></i> <a
                            href="#">{{ $news->created_at->diffForHumans() }}</a>
                    </li>
                </ul>
            </div>
            <div class="blog-button">
                <a class="iq-link-button" href="{{ url('/news/'.$news->slug) }}">Read More</a>
            </div>
        </div>
    </div>
</div>
