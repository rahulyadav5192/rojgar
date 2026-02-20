<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gallery - {{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nivo-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>
    @include('partials.header')

    <section id="gallery-page" class="section-padding" style="padding-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Gallery</h2>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Photos from our events and job fairs.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($images as $image)
                    <div class="col-md-6 col-sm-6 col-lg-3 mb-4">
                        <div class="gallery-box">
                            <div class="img-thumb">
                                <img class="img-fluid" src="{{ \Illuminate\Support\Str::startsWith($image->image, ['uploads/', 'assets/']) ? asset($image->image) : asset('storage/'.$image->image) }}" alt="{{ $image->caption ?? 'Gallery' }}">
                            </div>
                            <div class="overlay-box text-center">
                                <a class="lightbox" href="{{ \Illuminate\Support\Str::startsWith($image->image, ['uploads/', 'assets/']) ? asset($image->image) : asset('storage/'.$image->image) }}" title="{{ $image->caption ?? '' }}">
                                    <i class="lni-plus"></i>
                                </a>
                            </div>
                        </div>
                        @if($image->caption)
                            <p class="text-center small text-muted mt-2 mb-0">{{ Str::limit($image->caption, 50) }}</p>
                        @endif
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No images in the gallery yet. Check back later.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script src="{{ asset('assets/js/jquery-min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/nivo-lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.lightbox').nivoLightbox();
        });
    </script>
</body>
</html>
