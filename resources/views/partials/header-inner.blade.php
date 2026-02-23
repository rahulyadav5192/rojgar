    <!-- Inner page: Navbar only (no hero) -->
    <header id="header-wrap" class="header-inner">
        <nav class="navbar navbar-expand-lg navbar-inner fixed-top">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#gallery">Flashback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#schedules">Upcoming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#blog">Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#schedules">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}#contact-map">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="header-inner-spacer"></div>
