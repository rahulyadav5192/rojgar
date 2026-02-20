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
                            <a class="nav-link" href="#header-wrap">
                  Home
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">
                  About
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#schedules">
                  schedules
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#team">
                  Speakers
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery') }}">
                  Gallery
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sponsors">
                  Sponsors
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#google-map-area">
                  Contact
                </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Hero Area: Two Event Cards over background image (latest 2 featured events) -->
        <div id="hero-area" class="hero-cards-section" style="background-image: url('{{ asset('assets/img/hero-area.jpg') }}');">
            <div class="hero-cards-section__overlay"></div>
            <div class="hero-cards-section__inner">
                <div class="row justify-content-center">
                    @forelse($featuredEvents ?? [] as $index => $event)
                        <div class="col-auto col-lg-5 col-md-6 col-10 mb-3 mb-lg-0">
                            <div class="event-card event-card--hero wow fadeInUp" data-wow-delay="{{ 0.2 + $index * 0.1 }}s">
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
                        <div class="col-auto col-lg-5 col-md-6 col-10 mb-3 mb-lg-0">
                            <div class="event-card event-card--hero wow fadeInUp" data-wow-delay="0.2s">
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
