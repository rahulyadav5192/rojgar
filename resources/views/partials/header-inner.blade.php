    <!-- Inner page: Navbar only (no hero) -->
    <header id="header-wrap" class="header-inner">
        <nav class="navbar navbar-expand-lg navbar-inner fixed-top">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand" style="padding: 10px 16px;"><img src="{{ asset('logo.png') }}" alt="" style="max-height: 38px; width: auto; object-fit: contain; padding: 4px 0;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#schedules">Schedules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#team">Speakers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#sponsors">Sponsors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#google-map-area">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="header-inner-spacer"></div>
