<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>EventUp - Event and Conference Template</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/bootstrap.min.css") }}">
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
                                <h2>About The Conference</h2>
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
                            <a class="btn btn-common" href="#">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Event Image Section -->
    <div class="ready-to-play">
        <img src="{{ asset('event.jpg') }}" alt="Event" class="ready-to-play__img">
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
                        <li><span><b>Location</b> Maria Hall, NY, USA</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <ul>
                        <li>
                            <i class="lni-calendar"></i>
                        </li>
                        <li><span><b>Date & Time</b> 10am - 7pm, 15th Oct</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <ul>
                        <li>
                            <i class="lni-mic"></i>
                        </li>
                        <li><span><b>Speakers</b> 25 Professionals</span></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <ul>
                        <li>
                            <i class="lni-user"></i>
                        </li>
                        <li><span><b>Seats</b> 100 People</span></li>
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
                        <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why You Should Join?</h2>
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Register for free, submit your CV, and connect directly with employers. <br> Your next job opportunity is one step away.</p>
                    </div>
                </div>
            </div>
            <div class="row intro-wrapper">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="single-intro-text mb-70">
                        <i class="lni-user"></i>
                        <h3>Register Online</h3>
                        <p>
                            Sign up for the job fair in minutes. Free registration for all job seekers.
                        </p>
                        <span class="count-number">01</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="single-intro-text">
                        <i class="lni-files"></i>
                        <h3 class="ts-title">Submit Your CV</h3>
                        <p>
                            Upload your resume so employers can find and shortlist you for roles.
                        </p>
                        <span class="count-number">02</span>
                    </div>
                    <div class="border-shap left"></div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="single-intro-text mb-70">
                        <i class="lni-briefcase"></i>
                        <h3>Meet Employers</h3>
                        <p>
                            Connect with hiring companies and recruiters from various industries.
                        </p>
                        <span class="count-number">03</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="single-intro-text mb-70">
                        <i class="lni-star"></i>
                        <h3>Get Shortlisted</h3>
                        <p>
                            Stand out with your profile and get called for interviews.
                        </p>
                        <span class="count-number">04</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="single-intro-text mb-70">
                        <i class="lni-microphone"></i>
                        <h3>One-on-One Sessions</h3>
                        <p>
                            Talk directly to recruiters and discuss opportunities.
                        </p>
                        <span class="count-number">05</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="single-intro-text mb-70">
                        <i class="lni-rocket"></i>
                        <h3>Land Your Dream Job</h3>
                        <p>
                            Take the next step in your career with real job offers.
                        </p>
                        <span class="count-number">06</span>
                    </div>
                </div>
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
                            <div class="counterUp">42</div>
                            <p>Spekers</p>
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
                            <div class="counterUp">800</div>
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
                            <div class="counterUp">24</div>
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
                            <div class="counterUp">56</div>
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
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="event-card wow fadeInUp" data-wow-delay="0.2s">
                        <div class="event-card__img">
                            <img src="{{ asset('event.jpg') }}" alt="Rozgaar Mahakumbh Lucknow">
                        </div>
                        <div class="event-card__body">
                            <h3 class="event-card__title">Rozgaar Mahakumbh – Lucknow</h3>
                            <p class="event-card__desc">UP’s largest job fair. Meet 100+ employers, submit your CV, and explore opportunities across sectors. Register now for free entry.</p>
                            <ul class="event-card__meta">
                                <li><i class="lni-calendar"></i> 15 Mar 2025, 10:00 AM – 6:00 PM</li>
                                <li><i class="lni-map-marker"></i> Lucknow, Uttar Pradesh</li>
                            </ul>
                            <a href="#" class="btn btn-common event-card__btn">Register Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="event-card wow fadeInUp" data-wow-delay="0.3s">
                        <div class="event-card__img">
                            <img src="{{ asset('event.jpg') }}" alt="Tech & IT Recruitment Drive">
                        </div>
                        <div class="event-card__body">
                            <h3 class="event-card__title">Tech & IT Recruitment Drive</h3>
                            <p class="event-card__desc">Focused on IT and tech roles. Bring your resume and meet hiring managers from top companies. Walk-in interviews on the spot.</p>
                            <ul class="event-card__meta">
                                <li><i class="lni-calendar"></i> 22 Mar 2025, 9:00 AM – 5:00 PM</li>
                                <li><i class="lni-map-marker"></i> Noida, Uttar Pradesh</li>
                            </ul>
                            <a href="#" class="btn btn-common event-card__btn">Register Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="event-card wow fadeInUp" data-wow-delay="0.4s">
                        <div class="event-card__img">
                            <img src="{{ asset('event.jpg') }}" alt="Youth Employment Mela Kanpur">
                        </div>
                        <div class="event-card__body">
                            <h3 class="event-card__title">Youth Employment Mela – Kanpur</h3>
                            <p class="event-card__desc">Dedicated to young job seekers. Multiple industries, entry to mid-level roles. Register, upload your CV, and get shortlisted.</p>
                            <ul class="event-card__meta">
                                <li><i class="lni-calendar"></i> 05 Apr 2025, 10:00 AM – 6:00 PM</li>
                                <li><i class="lni-map-marker"></i> Kanpur, Uttar Pradesh</li>
                            </ul>
                            <a href="#" class="btn btn-common event-card__btn">Register Now</a>
                        </div>
                    </div>
                </div>
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
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-bt">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- Team Item Starts -->
                    <div class="team-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset("assets/img/team/team-01.jpg") }}" alt="">
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
                            <h3><a href="#">JONATHON DOE</a></h3>
                            <p>Product Designer, Tesla</p>
                        </div>
                    </div>
                    <!-- Team Item Ends -->
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- Team Item Starts -->
                    <div class="team-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset("assets/img/team/team-02.jpg") }}" alt="">
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
                            <h3><a href="#">Patric Green</a></h3>
                            <p>Front-end Developer</p>
                        </div>
                    </div>
                    <!-- Team Item Ends -->
                </div>

                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- Team Item Starts -->
                    <div class="team-item wow fadeInUp" data-wow-delay="0.6s">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset("assets/img/team/team-03.jpg") }}" alt="">
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
                            <h3><a href="#">Paul Kowalsy</a></h3>
                            <p>Lead Designer, TNW</p>
                        </div>
                    </div>
                    <!-- Team Item Ends -->
                </div>

                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- Team Item Starts -->
                    <div class="team-item wow fadeInUp" data-wow-delay="0.8s">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset("assets/img/team/team-04.jpg") }}" alt="">
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
                            <h3><a href="#">Jhon Doe</a></h3>
                            <p>Back-end Developer, ASUS</p>
                        </div>
                    </div>
                    <!-- Team Item Ends -->
                </div>

                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- Team Item Starts -->
                    <div class="team-item wow fadeInUp" data-wow-delay="1s">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset("assets/img/team/team-05.jpg") }}" alt="">
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
                            <h3><a href="#">Daryl Dixon</a></h3>
                            <p>Full-stack Developer, Google</p>
                        </div>
                    </div>
                    <!-- Team Item Ends -->
                </div>

                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- Team Item Starts -->
                    <div class="team-item wow fadeInUp" data-wow-delay="1.2s">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset("assets/img/team/team-06.jpg") }}" alt="">
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
                            <h3><a href="#">Chris Adams</a></h3>
                            <p>UI Designer, Apple</p>
                        </div>
                    </div>
                    <!-- Team Item Ends -->
                </div>

                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- Team Item Starts -->
                    <div class="team-item wow fadeInUp" data-wow-delay="1.4s">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset("assets/img/team/team-07.jpg") }}" alt="">
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
                            <h3><a href="#">Paul Kowalsy</a></h3>
                            <p>Lead Designer, TNW</p>
                        </div>
                    </div>
                    <!-- Team Item Ends -->
                </div>

                <div class="col-lg-3 col-md-6 col-xs-12">
                    <!-- Team Item Starts -->
                    <div class="team-item wow fadeInUp" data-wow-delay="1.6s">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset("assets/img/team/team-08.jpg") }}" alt="">
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
                            <h3><a href="#">Jhon Doe</a></h3>
                            <p>Back-end Developer, ASUS</p>
                        </div>
                    </div>
                    <!-- Team Item Ends -->
                </div>
            </div>
            <a href="#" class="btn btn-common mt-30 wow fadeInUp" data-wow-delay="1.9s">Meet all speakers</a>
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
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="gallery-box">
                        <div class="img-thumb">
                            <img class="img-fluid" src="{{ asset("assets/img/gallery/img-1.jpg") }}" alt="">
                        </div>
                        <div class="overlay-box text-center">
                            <a class="lightbox" href="{{ asset("assets/img/gallery/img-1.jpg") }}">
                  <i class="lni-plus"></i>
                </a>
                        </div>
                    </div>
                </div>
                <div class="ccol-md-6 col-sm-6 col-lg-3">
                    <div class="gallery-box">
                        <div class="img-thumb">
                            <img class="img-fluid" src="{{ asset("assets/img/gallery/img-2.jpg") }}" alt="">
                        </div>
                        <div class="overlay-box text-center">
                            <a class="lightbox" href="{{ asset("assets/img/gallery/img-2.jpg") }}">
                  <i class="lni-plus"></i>
                </a>
                        </div>
                    </div>
                </div>
                <div class="ccol-md-6 col-sm-6 col-lg-3">
                    <div class="gallery-box">
                        <div class="img-thumb">
                            <img class="img-fluid" src="{{ asset("assets/img/gallery/img-3.jpg") }}" alt="">
                        </div>
                        <div class="overlay-box text-center">
                            <a class="lightbox" href="{{ asset("assets/img/gallery/img-3.jpg") }}">
                  <i class="lni-plus"></i>
                </a>
                        </div>
                    </div>
                </div>
                <div class="ccol-md-6 col-sm-6 col-lg-3">
                    <div class="gallery-box">
                        <div class="img-thumb">
                            <img class="img-fluid" src="{{ asset("assets/img/gallery/img-4.jpg") }}" alt="">
                        </div>
                        <div class="overlay-box text-center">
                            <a class="lightbox" href="{{ asset("assets/img/gallery/img-4.jpg") }}">
                  <i class="lni-plus"></i>
                </a>
                        </div>
                    </div>
                </div>
                <div class="ccol-md-6 col-sm-6 col-lg-3">
                    <div class="gallery-box">
                        <div class="img-thumb">
                            <img class="img-fluid" src="{{ asset("assets/img/gallery/img-5.jpg") }}" alt="">
                        </div>
                        <div class="overlay-box text-center">
                            <a class="lightbox" href="{{ asset("assets/img/gallery/img-5.jpg") }}">
                  <i class="lni-plus"></i>
                </a>
                        </div>
                    </div>
                </div>
                <div class="ccol-md-6 col-sm-6 col-lg-3">
                    <div class="gallery-box">
                        <div class="img-thumb">
                            <img class="img-fluid" src="{{ asset("assets/img/gallery/img-6.jpg") }}" alt="">
                        </div>
                        <div class="overlay-box text-center">
                            <a class="lightbox" href="{{ asset("assets/img/gallery/img-6.jpg") }}">
                  <i class="lni-plus"></i>
                </a>
                        </div>
                    </div>
                </div>
                <div class="ccol-md-6 col-sm-6 col-lg-3">
                    <div class="gallery-box">
                        <div class="img-thumb">
                            <img class="img-fluid" src="{{ asset("assets/img/gallery/img-7.jpg") }}" alt="">
                        </div>
                        <div class="overlay-box text-center">
                            <a class="lightbox" href="{{ asset("assets/img/gallery/img-7.jpg") }}">
                  <i class="lni-plus"></i>
                </a>
                        </div>
                    </div>
                </div>
                <div class="ccol-md-6 col-sm-6 col-lg-3">
                    <div class="gallery-box">
                        <div class="img-thumb">
                            <img class="img-fluid" src="{{ asset("assets/img/gallery/img-8.jpg") }}" alt="">
                        </div>
                        <div class="overlay-box text-center">
                            <a class="lightbox" href="{{ asset("assets/img/gallery/img-8.jpg") }}">
                  <i class="lni-plus"></i>
                </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-xs-12">
                    <a href="#" class="btn btn-common">Browse All</a>
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
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
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
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="blog-item">
                        <div class="blog-image">
                            <a href="#">
                  <img class="img-fluid" src="{{ asset("assets/img/blog/img-1.jpg") }}" alt="">
                </a>
                        </div>
                        <div class="descr">
                            <div class="icon">
                                <i class="lni-image"></i>
                            </div>
                            <h3 class="title">
                                <a href="#">
                    Learn Something New
                  </a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipsing elit, sed do eiusmodincididunt ut labore et dolore</p>
                        </div>
                        <div class="meta-tags">
                            <span class="date"><i class="lni-calendar"></i> Jan 20, 2020</span>
                            <span class="comments"><i class="lni-comment-alt"></i> <a href="#"> 0 Comment</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="blog-item">
                        <div class="blog-image">
                            <a href="#">
                  <img class="img-fluid" src="{{ asset("assets/img/blog/img-2.jpg") }}" alt="">
                </a>
                        </div>
                        <div class="descr">
                            <div class="icon">
                                <i class="lni-arrow-right"></i>
                            </div>
                            <h3 class="title">
                                <a href="#">
                    Call for sponsors
                  </a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipsing elit, sed do eiusmodincididunt ut labore et dolore</p>
                        </div>
                        <div class="meta-tags">
                            <span class="date"><i class="lni-calendar"></i> Jan 20, 2020</span>
                            <span class="comments"><i class="lni-comment-alt"></i> <a href="#"> 0 Comment</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="blog-item">
                        <div class="blog-image">
                            <a href="#">
                  <img class="img-fluid" src="{{ asset("assets/img/blog/img-3.jpg") }}" alt="">
                </a>
                        </div>
                        <div class="descr">
                            <div class="icon">
                                <i class="lni-camera"></i>
                            </div>
                            <h3 class="title">
                                <a href="#">
                    Elon Musk joining the event
                  </a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipsing elit, sed do eiusmodincididunt ut labore et dolore</p>
                        </div>
                        <div class="meta-tags">
                            <span class="date"><i class="lni-calendar"></i> Jan 20, 2020</span>
                            <span class="comments"><i class="lni-comment-alt"></i> <a href="#"> 0 Comment</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-common">View all Blog</a>
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
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-30 text-center wow fadeInDown" data-wow-delay="0.3s">
                <div class="col-lg-12">
                    <div class="sponsors-logo text-center">
                        <a href=""><img src="{{ asset("assets/img/sponsors/logo-1.png") }}" alt=""></a>
                        <a href=""><img src="{{ asset("assets/img/sponsors/logo-2.png") }}" alt=""></a>
                        <a href=""><img src="{{ asset("assets/img/sponsors/logo-3.png") }}" alt=""></a>
                        <a href=""><img src="{{ asset("assets/img/sponsors/logo-4.png") }}" alt=""></a>
                        <a href=""><img src="{{ asset("assets/img/sponsors/logo-5.png") }}" alt=""></a>
                        <a href=""><img src="{{ asset("assets/img/sponsors/logo-6.png") }}" alt=""></a>
                        <a href=""><img src="{{ asset("assets/img/sponsors/logo-7.png") }}" alt=""></a>
                        <a href=""><img src="{{ asset("assets/img/sponsors/logo-8.png") }}" alt=""></a>
                        <a href=""><img src="{{ asset("assets/img/sponsors/logo-9.png") }}" alt=""></a>
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
                        <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="container-form wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="form-wrapper">
                            <form role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
                                <div class="row">
                                    <div class="col-md-6 form-line">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="email" placeholder="First Name" required data-error="Please enter your name">
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
                <div class="col-lg-4 col-md-5 col-xs-12">
                    <ul>
                        <li>
                            <i class="lni-home"></i>
                        </li>
                        <li><span>Cesare Rosaroll, 118 80139 Eventine</li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-3 col-xs-12">
            <ul>
              <li>
                <i class="lni-phone"></i>
              </li>
              <li><span>+789 123 456 79</span></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-3 col-xs-12">
                    <ul>
                        <li>
                            <i class="lni-envelope"></i>
                        </li>
                        <li><span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f4a78184849b8680b4918c9599849891da979b99">[email&#160;protected]</a></span></li>
                    </ul>
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

    
</body>

</html>