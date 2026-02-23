<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>{{ $blog->title ?? 'Blog Details' }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nivo-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/inner-pages.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    @include('partials.meta-pixel')
    <style>
        #header-wrap.header-inner {
            position: sticky;
            top: 0;
            z-index: 1100;
            background: #fff;
        }

        #header-wrap .navbar-inner {
            background: #fff !important;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            border-bottom: 1px solid #eceff4;
        }

        .header-inner-spacer {
            height: 96px;
        }

        .blog-page {
            background: linear-gradient(180deg, #f8fbff 0%, #ffffff 70%);
            padding: 36px 0 70px;
        }

        .blog-shell {
            max-width: 920px;
        }

        .blog-breadcrumb {
            background: transparent;
            padding: 0;
            margin: 12px 0 16px;
            font-size: 0.9rem;
        }

        .blog-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
            color: #94a3b8;
        }

        .blog-breadcrumb a {
            color: #2563eb;
            text-decoration: none;
        }

        .blog-breadcrumb a:hover {
            text-decoration: underline;
        }

        .blog-card {
            background: #fff;
            border: 1px solid #e9eef5;
            border-radius: 18px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
            overflow: hidden;
        }

        .blog-card-head {
            padding: 34px 34px 18px;
        }

        .blog-title {
            font-size: clamp(1.7rem, 3vw, 2.5rem);
            font-weight: 700;
            line-height: 1.2;
            color: #0f172a;
            margin: 0 0 14px;
        }

        .blog-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 16px;
            color: #475569;
            font-size: 0.95rem;
        }

        .blog-meta i {
            color: #2563eb;
            margin-right: 6px;
        }

        .blog-image-wrap {
            margin: 0 18px 24px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 14px 30px rgba(2, 6, 23, 0.18);
            background: #e2e8f0;
        }

        .blog-image {
            max-width: 100%;
            width: 100%;
            max-height: 520px;
            object-fit: cover;
            display: block;
        }

        .blog-content {
            padding: 0 34px 34px;
            font-size: 1.1rem;
            line-height: 1.85;
            color: #1e293b;
        }

        .blog-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 16px 0;
        }

        .blog-content h1, .blog-content h2, .blog-content h3, .blog-content h4 {
            color: #0f172a;
            margin-top: 24px;
            margin-bottom: 12px;
        }

        .blog-content p:last-child {
            margin-bottom: 0;
        }

        .blog-footer-actions {
            margin-top: 26px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .blog-footer-actions .btn-outline-secondary {
            color: #000 !important;
            border-color: #6c757d;
        }

        .blog-footer-actions .btn-outline-secondary:hover,
        .blog-footer-actions .btn-outline-secondary:focus {
            color: #000 !important;
            background: #f1f3f5;
        }

        @media (max-width: 768px) {
            .blog-card-head {
                padding: 24px 20px 14px;
            }

            .blog-content {
                padding: 0 20px 24px;
            }

            .blog-image-wrap {
                margin: 0 12px 16px;
            }
        }
    </style>
</head>
<body>
    @php
        $blogImage = $blog->image
            ? (\Illuminate\Support\Str::startsWith($blog->image, ['uploads/', 'assets/']) ? asset($blog->image) : asset('storage/'.$blog->image))
            : null;
        $publishedDate = $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y');
    @endphp

    @include('partials.header-inner')

    <main class="blog-page">
        <div class="container blog-shell">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb blog-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/#blog') }}">Latest News</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page">{{ \Illuminate\Support\Str::limit($blog->title, 70) }}</li>
                </ol>
            </nav>

            <article class="blog-card">
                <div class="blog-card-head">
                    <h1 class="blog-title">{{ $blog->title }}</h1>
                    <div class="blog-meta">
                        <span><i class="lni-calendar"></i> {{ $publishedDate }}</span>
                        <span><i class="lni-book"></i> News Article</span>
                    </div>
                </div>

                @if($blogImage)
                    <div class="blog-image-wrap">
                        <img src="{{ $blogImage }}" alt="{{ $blog->title }}" class="blog-image">
                    </div>
                @endif

                <div class="blog-content">
                    {!! $blog->body !!}

                    <div class="blog-footer-actions">
                        <a href="{{ url('/#blog') }}" class="btn btn-common">More News</a>
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">Back to Home</a>
                    </div>
                </div>
            </article>
        </div>
    </main>

    @include('partials.footer')
    <script src="{{ asset('assets/js/jquery-min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
