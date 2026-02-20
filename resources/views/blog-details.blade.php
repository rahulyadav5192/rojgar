<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $blog->title ?? 'Blog Details' }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nivo-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    @include('partials.meta-pixel')
    <style>
        .blog-details-header {
            background: #f8f9fa;
            padding: 2rem 0;
            text-align: center;
        }
        .blog-details-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .blog-details-meta {
            color: #888;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }
        .blog-details-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .blog-details-content {
            font-size: 1.1rem;
            line-height: 1.7;
        }
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>
    @include('partials.header-inner')
    <div class="container mt-5 mb-5">
        <div class="blog-details-header">
            <div class="blog-details-title">{{ $blog->title }}</div>
            <div class="blog-details-meta">
                <span><i class="lni-calendar"></i> {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                @if($blog->author)
                    &nbsp;|&nbsp; <span><i class="lni-user"></i> {{ $blog->author }}</span>
                @endif
            </div>
            @if($blog->image)
                <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}" class="blog-details-image">
            @endif
        </div>
        <div class="blog-details-content">
            {!! $blog->body !!}
        </div>
        <div class="mt-4">
            <a href="{{ url('/') }}" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>
    @include('partials.footer')
    <script src="{{ asset('assets/js/jquery-min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
