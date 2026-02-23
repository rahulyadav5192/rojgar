<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Gallery - {{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/inner-pages.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    @include('partials.meta-pixel')
    <style>
        .header-inner-spacer {
            height: 96px;
        }

        .gallery-page {
            background: linear-gradient(180deg, #f7faff 0%, #ffffff 60%);
            padding: 28px 0 72px;
        }

        .gallery-breadcrumb {
            background: transparent;
            margin: 12px 0 0;
            padding: 0;
            font-size: 0.92rem;
        }

        .gallery-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
            color: #9aa4b2;
        }

        .gallery-breadcrumb a {
            color: #2563eb;
            text-decoration: none;
        }

        .gallery-breadcrumb a:hover {
            text-decoration: underline;
        }

        .gallery-heading {
            font-size: 2rem;
            font-weight: 700;
            margin: 10px 0 8px;
            color: #111827;
        }

        .gallery-subheading {
            color: #4b5563;
            margin-bottom: 0;
        }

        .gallery-card {
            border: 1px solid #e8edf5;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            height: 100%;
        }

        .gallery-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.14);
        }

        .gallery-card__image-wrap {
            position: relative;
            height: 230px;
            overflow: hidden;
            cursor: pointer;
        }

        .gallery-card__image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.35s ease;
        }

        .gallery-card:hover .gallery-card__image-wrap img {
            transform: scale(1.07);
        }

        .gallery-card__zoom {
            position: absolute;
            right: 14px;
            bottom: 14px;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: none;
            background: rgba(17, 24, 39, 0.82);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
        }

        .gallery-card__body {
            padding: 14px 16px 16px;
        }

        .gallery-card__caption {
            margin: 0;
            color: #374151;
            font-size: 0.95rem;
            line-height: 1.45;
        }

        .gallery-modal .modal-content {
            background: transparent;
            border: 0;
            border-radius: 0;
        }

        .gallery-modal .modal-header {
            border: 0;
            padding: 0 0 8px;
            justify-content: flex-end;
        }

        .gallery-modal .modal-body {
            padding: 0;
            text-align: center;
        }

        .gallery-modal__close {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.96);
            color: #0f172a;
            border: 0;
            border-radius: 50%;
            padding: 0;
            font-size: 16px;
            line-height: 1;
            opacity: 1;
            text-shadow: none;
            box-shadow: 0 10px 24px rgba(2, 6, 23, 0.22);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .gallery-modal__image {
            max-width: 100%;
            max-height: 75vh;
            border-radius: 12px;
            box-shadow: 0 24px 55px rgba(0, 0, 0, 0.45);
        }

        .gallery-modal__caption {
            margin-top: 12px;
            color: #fff;
            font-size: 0.95rem;
        }

        @media (max-width: 767px) {
            .gallery-heading {
                font-size: 1.6rem;
            }

            .gallery-card__image-wrap {
                height: 210px;
            }
        }
    </style>
</head>
<body>
    @include('partials.header-inner')

    <section class="gallery-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="mb-2">
                        <ol class="breadcrumb gallery-breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active text-muted" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                    <h1 class="gallery-heading">Event Gallery</h1>
                    <p class="gallery-subheading">Moments from our events, job fairs, and community activities.</p>
                </div>
            </div>

            <div class="row mt-4">
                @forelse($images as $image)
                    @php
                        $imageUrl = \Illuminate\Support\Str::startsWith($image->image, ['uploads/', 'assets/'])
                            ? asset($image->image)
                            : asset('storage/'.$image->image);
                    @endphp
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="gallery-card">
                            <div class="gallery-card__image-wrap js-gallery-open"
                                 data-image="{{ $imageUrl }}"
                                 data-caption="{{ $image->caption ?? 'Gallery image' }}"
                                 role="button"
                                 aria-label="Open image preview">
                                <img src="{{ $imageUrl }}" alt="{{ $image->caption ?? 'Gallery' }}">
                                <button type="button"
                                        class="gallery-card__zoom"
                                        aria-label="View larger image">
                                    <i class="lni-plus"></i>
                                </button>
                            </div>
                            <div class="gallery-card__body">
                                <p class="gallery-card__caption">{{ $image->caption ?: 'Rozgaar Mahakumbh event highlight' }}</p>
                            </div>
                        </div>
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

    <div class="modal fade gallery-modal" id="galleryLightboxModal" tabindex="-1" role="dialog" aria-labelledby="galleryLightboxLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close gallery-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="lni-close" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="galleryLightboxImage" class="gallery-modal__image" src="" alt="Gallery preview">
                    <p id="galleryLightboxCaption" class="gallery-modal__caption"></p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function () {
            const $modal = $('#galleryLightboxModal');
            const $image = $('#galleryLightboxImage');
            const $caption = $('#galleryLightboxCaption');

            $(document).on('click', '.js-gallery-open', function (event) {
                event.preventDefault();
                event.stopPropagation();

                const image = $(this).data('image');
                const caption = $(this).data('caption') || '';

                $image.attr('src', image);
                $caption.text(caption);
                $modal.modal('show');
            });

            $modal.on('hidden.bs.modal', function () {
                $image.attr('src', '');
                $caption.text('');
            });
        });
    </script>
</body>
</html>
