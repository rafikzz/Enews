<div class="iq-portfolio iq-mr-15">
    <a href="{{ url('/gallery/' . $gallery->id) }}">

        <div class="iq-portfolio-img">
            <img class="img-fluid" src="{{ $gallery->image() }}" alt="image">
        </div>
        <div class="portfolio-title">
            <h4 class="iq-title"> {{ $gallery->title }}</h4>
        </div>
        <div class="iq-portfolio-info text-left">
            <h4 class="portfolio-text">Photos({{ $gallery->subgalleries_count }}) </h4>
        </div>
    </a>

</div>
