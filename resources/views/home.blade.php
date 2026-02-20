<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Rozgaar Mahakumbh</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/fonts/line-icons.css") }}">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/nivo-lightbox.css") }}">
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/animate.css") }}">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/main.css") }}">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/responsive.css") }}">

    @include('partials.meta-pixel')
    <style>
        /* Standard Bootstrap 4 Modal Styling */
        .modal-backdrop {
            background-color: #000;
        }
        
        body.modal-open {
            overflow: hidden;
        }
        /* Force modal to be interactive and fully visible */
        .modal,
        .modal-content {
            pointer-events: auto !important;
            opacity: 1 !important;
        }
    </style>

</head>

<body>

    @include('partials.header')

    <!-- About Section Start -->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="img-thumb">
                        <img class="img-fluid" src="{{ asset("assets/img/about/img1.png") }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="about-content">
                        <div>
                            <div class="about-text">
                                <h2>{{ optional($aboutContent)->title ?? 'About The Conference' }}</h2>
                                @if(isset($aboutContent) && $aboutContent->description)
                                    {!! $aboutContent->description !!}
                                @else
                                <p>In a rapidly evolving global economy, Rozgaar Mahakumbh emerges as Uttar Pradesh’s largest integrated employment and placement initiative conceived to bridge the widening chasm between potential and opportunity.</p>
                                <p>Orchestrated by BCS Consulting Pvt. Ltd., this landmark movement is driven by a singular purpose: to make employment accessible, meaningful, and future-ready. More than a job fair, Rozgaar Mahakumbh is a structured platform designed to connect ambition with opportunity and translate policy intent into real livelihoods.</p>
                                <p>At the heart of this initiative lies Uttar Pradesh. With its immense demographic dividend, the state stands as the ideal launchpad for India’s employment-driven growth. Rozgaar Mahakumbh serves as a clarion call to employers, institutions, and communities to unlock India’s human capital and collectively propel Uttar Pradesh towards becoming the Employment Capital of India.</p>
                            </div>
                            <ul class="stylish-list mb-3">
                                <li><i class="lni-check-mark-circle"></i>Largest integrated employment & placement initiative in UP</li>
                                <li><i class="lni-check-mark-circle"></i>Orchestrated by BCS Consulting Pvt. Ltd.</li>
                                <li><i class="lni-check-mark-circle"></i>Making employment accessible, meaningful & future-ready</li>
                                <li><i class="lni-check-mark-circle"></i>Connecting ambition with opportunity</li>
                                <li><i class="lni-check-mark-circle"></i>Towards Uttar Pradesh as the Employment Capital of India</li>
                            </ul>
                                @endif
                            <!-- <a class="btn btn-common" href="#">Learn More</a> -->
                            @if(isset($upcomingEvents) && count($upcomingEvents) > 0)
                                <a href="{{ route('event.register', ['event' => $upcomingEvents[0]->id]) }}" class="btn btn-common mt-3">Register</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Event Image Section -->
    <div class="ready-to-play">
        <img src="{{ $conferenceContent && $conferenceContent->image ? (\Illuminate\Support\Str::startsWith($conferenceContent->image, ['uploads/', 'assets/']) ? asset($conferenceContent->image) : asset('storage/'.$conferenceContent->image)) : asset('event.jpg') }}" alt="Event" class="ready-to-play__img">
    </div>

    <!-- Information Bar Start -->
    <section id="information-bar">
        <div class="container">
            <div class="row inforation-wrapper">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <ul>
                        <li>
                            <i class="lni-map-marker"></i>
                        </li>
                        <li><span><b>Location</b> {{ optional($conferenceContent)->location ?? 'Maria Hall, NY, USA' }}</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <ul>
                        <li>
                            <i class="lni-calendar"></i>
                        </li>
                        <li><span><b>Date & Time</b> {{ optional($conferenceContent)->date_time ?? '10am - 7pm, 15th Oct' }}</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <ul>
                        <li>
                            <i class="lni-mic"></i>
                        </li>
                        <li><span><b>Speakers</b> {{ optional($conferenceContent)->speakers_text ?? '25 Professionals' }}</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <ul>
                        <li>
                            <i class="lni-user"></i>
                        </li>
                        <li><span><b>Seats</b> {{ optional($conferenceContent)->seats_text ?? '100 People' }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Information Bar End -->

    <!-- intro Section Start -->
    <section id="intro" class="intro section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">{{ optional($whySection)->title ?? 'Why You Should Join?' }}</h2>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">{{ optional($whySection)->description ?? 'Register for free, submit your CV, and connect directly with employers. Your next job opportunity is one step away.' }}</p>
                    </div>
                </div>
            </div>
            @php
                $whyIcons = ['lni-user', 'lni-files', 'lni-briefcase', 'lni-star', 'lni-microphone', 'lni-rocket'];
            @endphp
            <div class="row intro-wrapper">
                @for($i = 1; $i <= 6; $i++)
                    @php
                        $titleKey = 'card'.$i.'_title';
                        $descKey = 'card'.$i.'_desc';
                        $title = $whySection ? $whySection->$titleKey : null;
                        $desc = $whySection ? $whySection->$descKey : null;
                    @endphp
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="single-intro-text {{ $i === 2 ? '' : 'mb-70' }}">
                        <i class="{{ $whyIcons[$i - 1] ?? 'lni-star' }}"></i>
                        <h3 @if($i === 2) class="ts-title" @endif>{{ $title ?? ['Register Online', 'Submit Your CV', 'Meet Employers', 'Get Shortlisted', 'One-on-One Sessions', 'Land Your Dream Job'][$i - 1] }}</h3>
                        <p>{{ $desc ?? '—' }}</p>
                        <span class="count-number">{{ sprintf('%02d', $i) }}</span>
                    </div>
                    @if($i === 2)<div class="border-shap left"></div>@endif
                </div>
                @endfor
            </div>
        </div>
    </section>
    <!-- intro Section End -->

    <!-- Counter Area Start-->
    <section class="counter-section section-padding">
        <div class="container">
            <div class="row">
                <!-- Counter Item -->
                <div class="col-lg-3 col-md-6 col-xs-12 work-counter-widget">
                    <div class="counter">
                        <div class="icon">
                            <i class="lni-mic"></i>
                        </div>
                        <div class="counter-content">
                            <div class="counterUp">{{ optional($counterContent)->speakers_count ?? 42 }}</div>
                            <p>Speakers</p>
                        </div>
                    </div>
                </div>
                <!-- Counter Item -->
                <div class="col-lg-3 col-md-6 col-xs-12 work-counter-widget">
                    <div class="counter">
                        <div class="icon">
                            <i class="lni-bulb"></i>
                        </div>
                        <div class="counter-content">
                            <div class="counterUp">{{ optional($counterContent)->seats_count ?? 800 }}</div>
                            <p>Seats</p>
                        </div>
                    </div>
                </div>
                <!-- Counter Item -->
                <div class="col-lg-3 col-md-6 col-xs-12 work-counter-widget">
                    <div class="counter">
                        <div class="icon">
                            <i class="lni-briefcase"></i>
                        </div>
                        <div class="counter-content">
                            <div class="counterUp">{{ optional($counterContent)->sponsors_count ?? 24 }}</div>
                            <p>Sponsors</p>
                        </div>
                    </div>
                </div>
                <!-- Counter Item -->
                <div class="col-lg-3 col-md-6 col-xs-12 work-counter-widget">
                    <div class="counter">
                        <div class="icon">
                            <i class="lni-coffee-cup"></i>
                        </div>
                        <div class="counter-content">
                            <div class="counterUp">{{ optional($counterContent)->sessions_count ?? 56 }}</div>
                            <p>Sessions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Area End-->

    <!-- Upcoming Events Section Start -->
    <section id="schedules" class="section-padding" style="background: #f8f9fa;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Upcoming Events</h2>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Register for job fairs near you. Submit your CV and meet employers. <br> Free entry for all job seekers.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($upcomingEvents ?? [] as $index => $event)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="event-card wow fadeInUp" data-wow-delay="{{ 0.2 + $index * 0.1 }}s">
                            <div class="event-card__img">
                                <img src="{{ $event->image ? (\Illuminate\Support\Str::startsWith($event->image, ['uploads/', 'assets/']) ? asset($event->image) : asset('storage/'.$event->image)) : asset('event.jpg') }}" alt="{{ $event->title }}">
                                @if($event->type === 'International')
                                    <span class="badge bg-primary" style="position: absolute; top: 10px; left: 10px; font-size: 12px;">International</span>
                                @else
                                    <span class="badge bg-success" style="position: absolute; top: 10px; left: 10px; font-size: 12px;">Domestic</span>
                                @endif
                            </div>
                            <div class="event-card__body">
                                <h3 class="event-card__title">{{ $event->title }}</h3>
                                <p class="event-card__desc">{{ Str::limit($event->description, 150) ?: 'Register for this job fair. Submit your CV and meet employers.' }}</p>
                                <ul class="event-card__meta">
                                    <li><i class="lni-calendar"></i> {{ $event->start_date->format('d M Y') }}{{ $event->end_date && $event->end_date->ne($event->start_date) ? ' – ' . $event->end_date->format('d M Y') : '' }}{{ $event->timing ? ', ' . $event->timing : '' }}</li>
                                    @if($event->location)
                                        <li><i class="lni-map-marker"></i> {{ $event->location }}</li>
                                    @endif
                                </ul>
                                <a href="{{ route('event.register', ['event' => $event->id]) }}" class="btn btn-common">Register Now</a>
                            </div>
                        </div>
                        <!-- Registration Modal for this event -->
                        <!-- Modal removed: registration now handled on a separate page -->
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No upcoming events at the moment. Check back later.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Upcoming Events Section End -->

    <!-- Team Section Start -->
    <section id="team" class="section-padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Our Speakers</h2>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Meet industry leaders, career coaches, and HR experts sharing actionable insights on hiring trends, interview preparation, and career advancement.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-bt">
                @foreach($speakers ?? [] as $index => $speaker)
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="team-item wow fadeInUp" data-wow-delay="{{ 0.2 + $index * 0.2 }}s">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ $speaker->image ? (\Illuminate\Support\Str::startsWith($speaker->image, ['uploads/', 'assets/']) ? asset($speaker->image) : asset('storage/'.$speaker->image)) : asset('assets/img/team/team-01.jpg') }}" alt="{{ $speaker->name }}">
                            <div class="team-overlay">
                                <div class="overlay-social-icon text-center">
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="lni-google" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="lni-pinterest" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="info-text">
                            <h3><a href="#">{{ $speaker->name }}</a></h3>
                            <p>{{ $speaker->designation ?? '' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- <a href="#" class="btn btn-common mt-30 wow fadeInUp" data-wow-delay="1.9s">Meet all speakers</a> -->
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Gallary Section Start -->
    <section id="gallery" class="section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Event Gallery</h2>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Browse highlights from past Rozgaar Mahakumbh events — workshops, success stories, and memorable moments captured for your inspiration.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($galleryImages ?? [] as $image)
                    <div class="col-md-6 col-sm-6 col-lg-3">
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
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted">
                        <p>No gallery images yet. Check back later.</p>
                    </div>
                @endforelse
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-xs-12">
                    <!-- <a href="{{ route('gallery') }}" class="btn btn-common">Browse All</a> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Gallary Section End -->

    <!-- Event Slides Section Start -->
    {{-- <section id="event-up" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Upcoming Events</h2>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Read announcements, speaker spotlights, and practical career resources to help you prepare for the event and advance your job search.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="event-item">
                        <img class="img-fluid" src="{{ asset("assets/img/event/img1.jpg") }}" alt="">
                        <div class="overlay-text">
                            <div class="content">
                                <h3>Business Confrence</h3>
                                <a href="#">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="event-item">
                        <img class="img-fluid" src="{{ asset("assets/img/event/img2.jpg") }}" alt="">
                        <div class="overlay-text">
                            <div class="content">
                                <h3>Designer Confrence</h3>
                                <a href="#">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="event-item">
                        <img class="img-fluid" src="{{ asset("assets/img/event/img3.jpg") }}" alt="">
                        <div class="overlay-text">
                            <div class="content">
                                <h3>Marketer Confrence</h3>
                                <a href="#">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="event-item">
                        <img class="img-fluid" src="{{ asset("assets/img/event/img4.jpg") }}" alt="">
                        <div class="overlay-text">
                            <div class="content">
                                <h3>JS Confrence</h3>
                                <a href="#">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-common">More Event</a>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Event Slides Section End -->

    <!-- Blog Section Start -->
    <section id="blog" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Latest News</h2>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Our partners and sponsors support skills development and create direct hiring pathways — thank you to all organizations collaborating with us.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($latestBlogs ?? [] as $blog)
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="blog-item">
                        <div class="blog-image">
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                <img class="img-fluid" src="{{ $blog->image ? (Str::startsWith($blog->image, ['uploads/', 'assets/']) ? asset($blog->image) : asset('storage/'.$blog->image)) : asset('assets/img/blog/img-1.jpg') }}" alt="{{ $blog->title }}">
                            </a>
                        </div>
                        <div class="descr">
                            <div class="icon">
                                <i class="lni-image"></i>
                            </div>
                            <h3 class="title">
                                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                            </h3>
                            <p>{{ $blog->excerpt ?: Str::limit(strip_tags($blog->body), 120) }}</p>
                        </div>
                        <div class="meta-tags">
                            <span class="date"><i class="lni-calendar"></i> {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                            <span class="comments"><i class="lni-comment-alt"></i> <a href="{{ route('blog.show', $blog->slug) }}">Read more</a></span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-4 text-muted">
                    <p>No blog posts yet. Check back later.</p>
                </div>
                @endforelse
                <div class="col-12 text-center">
                    <!-- <a href="#" class="btn btn-common">View all Blog</a> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Sponsors Section Start -->
    <section id="sponsors" class="section-padding">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Sponsors</h2>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Questions about participating, sponsoring, or media inquiries? Contact our team and we'll guide you through registration, partnership, and logistics.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-30 text-center wow fadeInDown" data-wow-delay="0.3s">
                <div class="col-lg-12">
                    <div class="sponsors-logo text-center">
                        @forelse($sponsors ?? [] as $sponsor)
                            <a href="{{ $sponsor->link ?: '#' }}" target="_blank"><img src="{{ \Illuminate\Support\Str::startsWith($sponsor->image, ['uploads/', 'assets/']) ? asset($sponsor->image) : asset('storage/'.$sponsor->image) }}" alt="Sponsor" style="max-height:60px;margin:10px;object-fit:contain;background:#fff;padding:8px" /></a>
                        @empty
                            <a href=""><img src="{{ asset("assets/img/sponsors/logo-1.png") }}" alt=""></a>
                            <a href=""><img src="{{ asset("assets/img/sponsors/logo-2.png") }}" alt=""></a>
                            <a href=""><img src="{{ asset("assets/img/sponsors/logo-3.png") }}" alt=""></a>
                        @endforelse
                    </div>
                    <!-- sponsors logo end-->
                </div>
            </div>
        </div>
    </section>
    <!-- Sponsors Section End -->

    <!-- Contact Us Section -->
    <section id="contact-map" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Contact Us</h2>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Questions about participating, sponsoring, or media inquiries? Contact our team and we'll guide you through registration, partnership opportunities, and logistics.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="container-form wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="form-wrapper">
                            @if(session('contact_success'))
                                <div class="alert alert-success">{{ session('contact_success') }}</div>
                            @endif
                            <form role="form" action="{{ route('contact.submit') }}" method="post" id="contactForm" name="contact-form" data-toggle="validator">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-line">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-line">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required data-error="Please enter your Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-line">
                                        <div class="form-group">
                                            <input type="tel" class="form-control" id="msg_subject" name="subject" placeholder="Subject" required data-error="Please enter your message subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" id="message" name="message" required data-error="Write your message"></textarea>
                                        </div>
                                        <div class="form-submit">
                                            <button type="submit" class="btn btn-common" id="form-submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us Section End -->

    <!-- Map Section Start -->
    <section id="google-map-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <object style="border:0; height: 450px; width: 100%;" data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15864.15480778837!2d-77.44908382752939!3d38.953293865566366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6775cb22a9fa1341!2sThe+Firkin+%26+Fox!5e0!3m2!1sen!2sbd!4v1543773685573"></object>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Section End -->

    <!-- Contact text Start -->
    <section id="contact-text">
        <div class="container">
            <div class="row contact-wrapper">
                {{-- Footer content is provided by HomeController as $footer --}}
                <div class="col-lg-4 col-md-5 col-xs-12">
                    @if($footer && $footer->address)
                        <ul>
                            <li>
                                <i class="lni-home"></i>
                            </li>
                            <li><span>{{ $footer->address }}</span></li>
                        </ul>
                    @endif
                </div>
                <div class="col-lg-4 col-md-3 col-xs-12">
                    @if($footer && $footer->phone)
                    <ul>
                      <li>
                        <i class="lni-phone"></i>
                      </li>
                      <li><span>{{ $footer->phone }}</span></li>
                    </ul>
                    @endif
                </div>
                <div class="col-lg-4 col-md-3 col-xs-12">
                    @if($footer && $footer->email)
                    <ul>
                        <li>
                            <i class="lni-envelope"></i>
                        </li>
                        <li><span><a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a></span></li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Contact text End -->

    @include('partials.footer')

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
    	<i class="lni-chevron-up"></i>
    </a>

    <div id="preloader">
        <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset("assets/js/jquery-min.js") }}"></script>
    <script src="{{ asset("assets/js/popper.min.js") }}"></script>
    <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.countdown.min.js") }}"></script>
    <script src="{{ asset("assets/js/waypoints.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.counterup.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.nav.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.easing.min.js") }}"></script>
    <script src="{{ asset("assets/js/wow.js") }}"></script>
    <script src="{{ asset("assets/js/nivo-lightbox.js") }}"></script>
    <script src="{{ asset("assets/js/video.js") }}"></script>
    <script src="{{ asset("assets/js/main.js") }}"></script>
    <script src="{{ asset("assets/js/form-validator.min.js") }}"></script>
    <script src="{{ asset("assets/js/contact-form-script.min.js") }}"></script>

    <!-- Modal trigger script removed: Register buttons now redirect to registration page -->
    
</body>

</html>
