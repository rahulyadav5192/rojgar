    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-inverse fixed-top scrolling-navbar">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a href="{{ url("/") }}" class="navbar-brand"><img src="{{ asset("logo.png") }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">
                  Home
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">
                  About
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery">
                  Flashback
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#schedules">
                  Upcoming
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#blog">
                  Guide
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#schedules">
                  Register
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery') }}">
                  Gallery
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact-map">
                  Contact
                </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Hero Area: Two Event Cards over background image (latest 2 featured events) -->
        @php
            $heroBannerImage = (isset($bannerContent) && $bannerContent && $bannerContent->image)
                ? (\Illuminate\Support\Str::startsWith($bannerContent->image, ['uploads/', 'assets/']) ? asset($bannerContent->image) : asset('storage/'.$bannerContent->image))
                : asset('assets/img/hero-area.jpg');
            $heroBannerImageMobile = null;
            if (isset($bannerContent) && $bannerContent && !empty($bannerContent->mobile_image)) {
                $heroBannerImageMobile = \Illuminate\Support\Str::startsWith($bannerContent->mobile_image, ['uploads/', 'assets/'])
                    ? asset($bannerContent->mobile_image)
                    : asset('storage/'.$bannerContent->mobile_image);
            }
        @endphp
        <div id="hero-area" class="hero-cards-section" style="background-image: url('{{ $heroBannerImage }}');@if($heroBannerImageMobile) --hero-mobile-bg: url('{{ $heroBannerImageMobile }}'); @endif">
            <div class="hero-cards-section__overlay"></div>
            <div class="hero-cards-section__inner">
                <div class="row justify-content-center">
                    @forelse($featuredEvents ?? [] as $index => $event)
                        <div class="col-auto col-lg-5 col-md-6 col-10 mb-3 mb-lg-0 hero-event-card-wrapper">
                            <div class="event-card event-card--hero wow fadeInUp" data-wow-delay="{{ 0.2 + $index * 0.1 }}s">
                                <button type="button" class="hero-event-card__close" aria-label="Close card"><i class="fa fa-times" aria-hidden="true"></i></button>
                                <div class="event-card__img">
                                    <img src="{{ $event->image ? (\Illuminate\Support\Str::startsWith($event->image, ['uploads/', 'assets/']) ? asset($event->image) : asset('storage/'.$event->image)) : asset('event.jpg') }}" alt="{{ $event->title }}">
                                </div>
                                <div class="event-card__body">
                                    <h3 class="event-card__title">{{ $event->title }}</h3>
                                    <p class="event-card__desc">{{ Str::limit($event->description, 120) ?: 'Register for this job fair. Submit your CV and meet employers.' }}</p>
                                    <ul class="event-card__meta">
                                        <li><i class="lni-calendar"></i> {{ $event->start_date->format('d M Y') }}{{ $event->timing ? ', ' . $event->timing : '' }}</li>
                                        @if($event->location)
                                            <li><i class="lni-map-marker"></i> {{ $event->location }}</li>
                                        @endif
                                    </ul>
                                    <a href="{{ route('event.register', ['event' => $event->id]) }}" class="btn btn-common">Register Now</a>
                                </div>
                            </div>
                            <!-- Registration Modal -->
                            <x-event-registration-modal :event="$event" />
                        </div>
                    @empty
                        <div class="col-auto col-lg-5 col-md-6 col-10 mb-3 mb-lg-0 hero-event-card-wrapper">
                            <div class="event-card event-card--hero wow fadeInUp" data-wow-delay="0.2s">
                                <button type="button" class="hero-event-card__close" aria-label="Close card"><i class="fa fa-times" aria-hidden="true"></i></button>
                                <div class="event-card__img">
                                    <img src="{{ asset('event.jpg') }}" alt="Event">
                                </div>
                                <div class="event-card__body">
                                    <h3 class="event-card__title">Upcoming Job Fair</h3>
                                    <p class="event-card__desc">Register for job fairs near you. Submit your CV and meet employers. Free entry for all job seekers.</p>
                                    <ul class="event-card__meta">
                                        <li><i class="lni-calendar"></i> Check below for dates</li>
                                    </ul>
                                    <a href="#schedules" class="btn btn-common event-card__btn">View Events</a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

    </header>
    <!-- Header Area wrapper End -->

    <script>
    (function() {
        document.querySelectorAll('.hero-event-card__close').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var wrapper = this.closest('.hero-event-card-wrapper');
                if (wrapper) wrapper.style.display = 'none';
            });
        });
    })();
    </script>
