{{--
    Reusable Gallery Slider Component (Slick)
    -----------------------------------------
    Required:  $images  — array of full image URLs
    Optional:  $alt     — alt text for images (default: 'Gallery Image')

    CSS : frontend/assets/css/gallery-slider.css
    JS  : frontend/assets/js/gallery-slider.js
    Deps: slick.css, slick-theme.css, slick.min.js, jquery.magnific-popup
--}}

@if(!empty($images) && count($images) > 0)
<div class="photo-gallery-slider">
    @foreach($images as $image)
    <div class="gallery-card">
        <a href="{{ $image }}" class="gallery-card-link gallery-zoom">
            <div class="gallery-card-inner">
                <div class="gallery-image">
                    <img src="{{ $image }}" alt="{{ $alt ?? 'Gallery Image' }}" class="img-fluid">
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endif
