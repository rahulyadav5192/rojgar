    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-inverse fixed-top scrolling-navbar">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a href="{{ url("/") }}" class="navbar-brand" style="padding: 10px 16px;"><img src="{{ asset("logo.png") }}" alt="" style="max-height: 44px; width: auto; object-fit: contain; padding: 4px 0;"></a>
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
                            <a class="nav-link" href="{{ url('/about') }}">
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
                            <a class="nav-link" href="#gallery">
                  Gallery
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">
                  pricing
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

        <!-- Hero Section (DevConf-style) -->
        <div id="hero-area" class="hero-modern">
            <div class="hero-modern__bg">
                <div class="hero-modern__overlay hero-modern__overlay--dark"></div>
                <div class="hero-modern__overlay hero-modern__overlay--primary"></div>
                <img class="hero-modern__img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_cQ9eL7xWgL8yoz10xe3zZHtDvdbhkbuMZzt7K3fT0Sp--BQgnzfBE113CFS88mbsXQmo56BAT9W4wqdzU-oH_43RazoHBqOv1OiUA9HxFx02ZvwKXlirGy5Z3ZgF4gm4dkPgF1NeDGol4WdN6P6PQELdjp0FTGERG35A4vnHnnuQXJIVVwjxlvByEiKM6K3kf5NCFdtrzn5BRDOXysJFh6o28lIi770qv-nhMqFmfcThCZU3JmP4nSUCCpOeqGHGCX1wssxuQn4" alt="Tech audience"/>
            </div>
            <div class="hero-modern__content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12 hero-modern__left">
                            <div class="hero-modern__pills">
                                <span class="hero-modern__pill"><i class="lni-calendar"></i> Oct 15, 2020</span>
                                {{-- <span class="hero-modern__pill"><i class="lni-map-marker"></i> Maria Hall, NY</span> --}}
                            </div>
                            <h1 class="hero-modern__title">
                                <span class="hero-modern__title-line">Developers</span>
                                <span class="hero-modern__title-line hero-modern__title-line--accent">Conference</span>
                            </h1>
                            <p class="hero-modern__desc">
                                Join over 2,500 innovators for a premier day of high-performance engineering. Dive into deep-tech workshops, network with industry leaders, and shape the future of software development.
                            </p>
                            <div class="hero-modern__actions">
                                <a href="#" class="btn hero-modern__btn hero-modern__btn--primary">Get Ticket <i class="lni-arrow-right"></i></a>
                                <a href="#schedules" class="btn hero-modern__btn hero-modern__btn--outline">View Schedule</a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 hero-modern__right">
                            <div class="hero-modern__card">
                                <div class="hero-modern__card-glow hero-modern__card-glow--1"></div>
                                <div class="hero-modern__card-glow hero-modern__card-glow--2"></div>
                                <h3 class="hero-modern__card-title">Event Starts In</h3>
                                <div class="hero-modern__countdown">
                                    <div class="hero-modern__countdown-item">
                                        <span class="hero-modern__countdown-num" id="hero-days">0</span>
                                        <span class="hero-modern__countdown-label">Days</span>
                                    </div>
                                    <div class="hero-modern__countdown-item">
                                        <span class="hero-modern__countdown-num" id="hero-hours">00</span>
                                        <span class="hero-modern__countdown-label">Hours</span>
                                    </div>
                                    <div class="hero-modern__countdown-item">
                                        <span class="hero-modern__countdown-num hero-modern__countdown-num--accent" id="hero-minutes">00</span>
                                        <span class="hero-modern__countdown-label">Minutes</span>
                                    </div>
                                    <div class="hero-modern__countdown-item hero-modern__countdown-item--highlight">
                                        <span class="hero-modern__countdown-num" id="hero-seconds">00</span>
                                        <span class="hero-modern__countdown-label">Seconds</span>
                                    </div>
                                </div>
                                <div class="hero-modern__card-footer">
                                    <div class="hero-modern__avatars">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC2fsur8_cG0l68TUi9rRYgEurGZur2DmTmF2HUwyMj20aNgbz_CMLZNe9y_zwQrLbC51f6Jk70RWk_W4-dGYiwlHM7LYZyCdAbZgv6OFXNWMhbZZD3PXO0zS2mgIV0jpMd-3fZC8nv3sgp8_CPBaPXFIyIG3M5UBH6d0x6x8VKnli0HRKslEH7awZkhePF8T4sMccBDjZ5j25pwmHwIRgN8-hFamHZjd7pNVNPrlAayTNVt8Z9csfRR533ntx0R4fjpAR-TfK6Ogw" alt="Speaker" class="hero-modern__avatar"/>
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdTHZGLh50W1F6W09LzF-KAhoyr5NC4FtM5fmWL3ngwBXAtdGFCM-CpuGYiqmD7okP7ykDgcAPn-o-v2cdBMAiNTo1eWKxAyDZFpulRVLqUr47i00-z63Y1IdzAAFyYQdm-Z-dv-iIXgdRfxkcsITZy4_ciRnUEWBPSayL6VyqxEEVExahBZ95DHmIe91OCu_hIrpXy-qw9hYEH_oAiDszbpwWg4jcG_0UHuBqjzlvlG0W1PX3gOezZhf3Mq31LbwGB-2XsXpiVYA" alt="Speaker" class="hero-modern__avatar"/>
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHyDqzkW-F4Bg4IRS9pvjJLw2zpumffGx0NVM1xy7aq9TT1ILzuQUWpHb23NuSqQLYlK9iNwDk8BvV-yDnxo7Yg-U9YYKjEart9aXtLmT0YOTf4lvKHyJC0N0SGsAk7YID7Y7mq4XX-L8nSieIjnwJWC_tYeeuvkViodm060yXgG7tS-Aw7GpRM1IGqozPDbooxU0q_A35Prk2IsQda5yYIUUJM0GL860OWD2IgA8SA9KuMyV1SbdUdCv9xDreEgla0ax9YZAAZK8" alt="Speaker" class="hero-modern__avatar"/>
                                        <span class="hero-modern__avatar hero-modern__avatar--more">+40</span>
                                    </div>
                                    <p class="hero-modern__card-caption">World-class speakers attending</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

    </header>
    <!-- Header Area wrapper End -->
