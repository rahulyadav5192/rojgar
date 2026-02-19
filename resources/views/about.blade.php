<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>About | Rozgaar Mahakumbh</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nivo-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/hero-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme-colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/inner-pages.css') }}">

    <!-- Tailwind for about page content -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#394BDE",
                        "accent-orange": "#FD612E",
                        "accent-green": "#08AB1E",
                        "accent-blue": "#394BDE",
                        "accent-red": "#FF3131",
                        "accent-purple": "#724C9D",
                        "background-light": "#fcfcfd",
                        "background-dark": "#ffffff",
                    },
                    fontFamily: { "display": ["Space Grotesk", "sans-serif"] },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Space Grotesk', sans-serif; }
        .glass-card { background: rgba(0, 0, 0, 0.02); backdrop-filter: blur(10px); border: 1px solid rgba(0, 0, 0, 0.05); }
        .glow-orange:hover { box-shadow: 0 10px 30px rgba(253, 97, 46, 0.15); }
        .glow-green:hover { box-shadow: 0 10px 30px rgba(8, 171, 30, 0.15); }
        .glow-blue:hover { box-shadow: 0 10px 30px rgba(57, 75, 222, 0.15); }
        .glow-red:hover { box-shadow: 0 10px 30px rgba(255, 49, 49, 0.15); }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        /* Footer on about page: ensure our footer styles apply */
        body.page-about footer { background: #1a1a2e !important; color: #eee; padding: 60px 0 30px; }
        body.page-about footer .subscribe-title,
        body.page-about footer .site-info p { color: #eee; }
        body.page-about footer .form-control { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); color: #fff; }
        body.page-about footer .form-control::placeholder { color: rgba(255,255,255,0.5); }
        body.page-about footer .social-icons-footer a { color: #eee; }
        .about-footer-wrapper { background: #1a1a2e; }
    </style>
</head>

<body class="page-about bg-background-light font-display text-slate-900 antialiased overflow-x-hidden">

    @include('partials.header-inner')

    <main>
        <!-- Hero Section -->
        <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden py-20">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-b from-primary/5 via-white to-white"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-primary/10 rounded-full blur-[120px]"></div>
            </div>
            <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-primary text-xs font-bold uppercase tracking-widest mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                    </span>
                    Our Vision 2024
                </div>
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter mb-8 leading-[0.9] text-slate-900">
                    Building the Future, <br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-accent-purple to-accent-blue">One Commit</span> at a Time.
                </h1>
                <p class="max-w-2xl mx-auto text-lg md:text-xl text-slate-600 font-light leading-relaxed mb-10">
                    DevConf is a global nexus where raw talent meets seasoned expertise to redefine the boundaries of modern technology.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="px-8 py-4 bg-primary text-white font-bold rounded-xl shadow-lg shadow-primary/20 hover:shadow-primary/40 transition-all">Explore Our Journey</button>
                    <button class="px-8 py-4 bg-slate-100 text-slate-700 font-bold rounded-xl border border-slate-200 hover:bg-slate-200 transition-all">Watch Manifesto</button>
                </div>
            </div>
        </section>
        <!-- Our Mission Section -->
        <section class="py-24 px-6 lg:px-20 bg-slate-50" id="mission">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl font-bold mb-6 flex items-center gap-4 text-slate-900">
                            <span class="w-12 h-1 bg-primary rounded-full"></span>
                            Our Mission
                        </h2>
                        <p class="text-xl text-slate-600 leading-relaxed mb-8">
                            DevConf exists to foster a global ecosystem where developers of all backgrounds can learn, innovate, and grow together. We believe that by providing the right platform, we can accelerate the next wave of technological breakthroughs.
                        </p>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="p-6 rounded-2xl glass-card bg-white shadow-sm">
                                <h3 class="text-3xl font-bold text-primary mb-1">50k+</h3>
                                <p class="text-sm text-slate-500">Active Developers</p>
                            </div>
                            <div class="p-6 rounded-2xl glass-card bg-white shadow-sm">
                                <h3 class="text-3xl font-bold text-accent-green mb-1">120+</h3>
                                <p class="text-sm text-slate-500">Open Source Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative group">
                        <div class="absolute -inset-4 bg-gradient-to-tr from-primary to-accent-blue rounded-[2rem] opacity-10 blur-2xl group-hover:opacity-20 transition-opacity"></div>
                        <div class="relative aspect-video rounded-2xl overflow-hidden border border-slate-200 shadow-2xl">
                            <img class="w-full h-full object-cover" data-alt="Dynamic tech office with developers collaborating" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBM1Q4sE2OBr_o1jlaGgv2mlHvaHf3cblMp1PT6OfSG7eZv5ledEu_8g5R1FSE-w5JhHM3RJtLLwVwI5V543gGmF3DxeHw1HF6yI-dN8Ti9Y43d9PrWr7U1tqBuLtWBzywNLcDxO80fs4h8Gg4yJESudAerjv8xgTd-4kjLQLydn-5gPonR4ApuUDLJgvXdjLhHKZhrshsuBZYZt7_TVkXSWwPEFSa_rd-gGjRG_rKC7JPH70gRFfpCIClFZDoMRfymETgQB3x13w0" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Core Values Section -->
        <section class="py-24 px-6 lg:px-20" id="values">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4 text-slate-900">Core Values</h2>
                    <p class="text-slate-600 max-w-xl mx-auto">The principles that guide our decisions and shape our global community.</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="group p-8 rounded-2xl glass-card bg-white border-t-4 border-accent-orange transition-all duration-300 glow-orange">
                        <div class="size-14 rounded-xl bg-accent-orange/10 flex items-center justify-center text-accent-orange mb-6">
                            <span class="material-symbols-outlined !text-3xl">lightbulb</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-900">Innovation</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">Pushing technical boundaries and encouraging unconventional thinking to solve complex problems.</p>
                    </div>
                    <div class="group p-8 rounded-2xl glass-card bg-white border-t-4 border-accent-green transition-all duration-300 glow-green">
                        <div class="size-14 rounded-xl bg-accent-green/10 flex items-center justify-center text-accent-green mb-6">
                            <span class="material-symbols-outlined !text-3xl">groups</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-900">Community</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">Fostering a collaborative environment where knowledge is shared freely and support is unconditional.</p>
                    </div>
                    <div class="group p-8 rounded-2xl glass-card bg-white border-t-4 border-accent-red transition-all duration-300 glow-red">
                        <div class="size-14 rounded-xl bg-accent-red/10 flex items-center justify-center text-accent-red mb-6">
                            <span class="material-symbols-outlined !text-3xl">diversity_3</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-900">Inclusion</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">Ensuring diverse perspectives are heard, as they are the catalyst for better code and better products.</p>
                    </div>
                    <div class="group p-8 rounded-2xl glass-card bg-white border-t-4 border-accent-blue transition-all duration-300 glow-blue">
                        <div class="size-14 rounded-xl bg-accent-blue/10 flex items-center justify-center text-accent-blue mb-6">
                            <span class="material-symbols-outlined !text-3xl">verified</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-900">Excellence</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">Striving for quality in every line of code, every design pixel, and every attendee experience.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Story / Timeline Section -->
        <section class="py-24 px-6 lg:px-20 bg-slate-50" id="story">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4 text-slate-900">Our Story</h2>
                    <p class="text-slate-600">From a humble coffee shop meetup to a global phenomenon.</p>
                </div>
                <div class="relative space-y-12">
                    <div class="absolute left-1/2 -translate-x-1/2 top-0 bottom-0 w-1 bg-gradient-to-b from-primary via-accent-purple to-accent-blue rounded-full opacity-20"></div>
                    <div class="relative flex items-center justify-between gap-8">
                        <div class="w-1/2 text-right hidden md:block">
                            <h4 class="text-2xl font-bold text-primary">2018</h4>
                            <p class="text-slate-600">The first meeting of 12 developers in a small garage in San Francisco.</p>
                        </div>
                        <div class="z-10 size-12 rounded-full bg-white border-4 border-primary shadow-[0_0_15px_rgba(57,75,222,0.3)] flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-xl">rocket_launch</span>
                        </div>
                        <div class="w-1/2 text-left md:hidden lg:block">
                            <h4 class="text-2xl font-bold text-primary md:hidden">2018</h4>
                            <div class="md:hidden text-slate-600 mb-2">The first meeting of 12 developers.</div>
                            <span class="hidden md:inline text-slate-800 font-medium">Concept Born</span>
                        </div>
                    </div>
                    <div class="relative flex items-center justify-between gap-8">
                        <div class="w-1/2 text-right">
                            <span class="hidden md:inline text-slate-800 font-medium">First Conference</span>
                        </div>
                        <div class="z-10 size-12 rounded-full bg-white border-4 border-accent-purple shadow-[0_0_15px_rgba(114,76,157,0.3)] flex items-center justify-center">
                            <span class="material-symbols-outlined text-accent-purple text-xl">event</span>
                        </div>
                        <div class="w-1/2 text-left">
                            <h4 class="text-2xl font-bold text-accent-purple">2020</h4>
                            <p class="text-slate-600">Pivoted to a virtual format reaching 5,000+ developers worldwide during the pandemic.</p>
                        </div>
                    </div>
                    <div class="relative flex items-center justify-between gap-8">
                        <div class="w-1/2 text-right">
                            <h4 class="text-2xl font-bold text-accent-blue">2023</h4>
                            <p class="text-slate-600">Became the fastest growing independent tech conference in North America.</p>
                        </div>
                        <div class="z-10 size-12 rounded-full bg-white border-4 border-accent-blue shadow-[0_0_15px_rgba(57,75,222,0.3)] flex items-center justify-center">
                            <span class="material-symbols-outlined text-accent-blue text-xl">trending_up</span>
                        </div>
                        <div class="w-1/2 text-left">
                            <span class="hidden md:inline text-slate-800 font-medium">Scale Phase</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Meet the Team Section -->
        <section class="py-24 px-6 lg:px-20" id="team">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
                    <div>
                        <h2 class="text-4xl font-bold mb-4 text-slate-900">Meet the Team</h2>
                        <p class="text-slate-600 max-w-xl">The architects, community builders, and dreamers behind DevConf.</p>
                    </div>
                    <button class="flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all">
                        View All Contributors <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="group">
                        <div class="relative aspect-[4/5] rounded-2xl overflow-hidden mb-6 bg-slate-200">
                            <img class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110" data-alt="Portrait of a smiling male tech founder" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDZvQWWcKj4vN7F0rMh_Fsom83rVNeqd_3ux6mywaR4gNrWPXNOdnWwhmjxL4IPBenytPSCsXbNvK1a23IH6Afi5_DLe7js3rIeaA3jdGFK7dG_-6bBy_wq0w3k6uq2KkXhByfHQPapUtTalXgk_hsqnvpL-itHuPRMIT04CYTVvbDDt53OMHmJq79cm-CTtHi_WLXQz9t3glvU184plK_KLLhdmGH-cr7CCozf7mn5Rm6h2SZHFyBDrrdzwvfI8-PuXspSTXDPYbI" alt="">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 via-transparent to-transparent opacity-60"></div>
                            <div class="absolute bottom-4 left-4 flex gap-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <a class="size-8 rounded-lg bg-white/20 flex items-center justify-center hover:bg-primary transition-colors" href="#"><span class="material-symbols-outlined !text-sm text-white">share</span></a>
                            </div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900">Marcus Chen</h4>
                        <p class="text-primary text-sm font-medium mb-2">Founder &amp; Visionary</p>
                        <p class="text-slate-600 text-sm">Passionate about democratizing technical education.</p>
                    </div>
                    <div class="group">
                        <div class="relative aspect-[4/5] rounded-2xl overflow-hidden mb-6 bg-slate-200">
                            <img class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110" data-alt="Portrait of a confident female community director" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC3V50u1wVMivKwkkh61HPjlQEagCqMBV2O9bOK83U6RiypA8JAn4VCwyjP9M5L-6WuKWZ_8wxH7UpDXHRn7iWqs4egdO8Po7OmcFmdsGqNLZQm-D3QF_SKYRpFBSay-E_dTIbA_B_4Ox64phQDKkkiQbNDxO7_HxSKyKejifYb38iOd0_Bhd3MJqdnmo7uglZqddMoRa9g4CGlEJgxDRnwoA2v6dnKzMKt-9hEPcdkG_V3uz7BwMzY05uCL8cO5hoA9NI9GxWWNDo" alt="">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 via-transparent to-transparent opacity-60"></div>
                            <div class="absolute bottom-4 left-4 flex gap-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <a class="size-8 rounded-lg bg-white/20 flex items-center justify-center hover:bg-accent-orange transition-colors" href="#"><span class="material-symbols-outlined !text-sm text-white">share</span></a>
                            </div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900">Sarah Jenkins</h4>
                        <p class="text-accent-orange text-sm font-medium mb-2">Community Director</p>
                        <p class="text-slate-600 text-sm">Empowering developers to share their stories globally.</p>
                    </div>
                    <div class="group">
                        <div class="relative aspect-[4/5] rounded-2xl overflow-hidden mb-6 bg-slate-200">
                            <img class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110" data-alt="Portrait of a tech lead in creative environment" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlO-au8VXQznG53SwW9OyxZ4GMceWkRX4EEw-GwOawX8K2N9smw3JDvsZX_g5GIP-eGUFY5bglfpGj6Ai9Z-wsjpeFL-FXFTB7VEn1L47rBMCc4FdZumVInoWdp0WP2ziQy9gOPq6Rg96CKBeXRBQ_cIayytHvKrE7nRSmayHQ6INYN2SBMJvPdGoiE7okQlYTtw0j1IHjPfN_Sb0AZfbolTRyNHpzhA8rBrqZvWbNc6EYxHz8QKMIqRd9yoWegzYo3yKqEI2NjKI" alt="">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 via-transparent to-transparent opacity-60"></div>
                            <div class="absolute bottom-4 left-4 flex gap-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <a class="size-8 rounded-lg bg-white/20 flex items-center justify-center hover:bg-accent-green transition-colors" href="#"><span class="material-symbols-outlined !text-sm text-white">share</span></a>
                            </div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900">David Okafor</h4>
                        <p class="text-accent-green text-sm font-medium mb-2">Technical Lead</p>
                        <p class="text-slate-600 text-sm">Optimizing infrastructure for seamless global collaboration.</p>
                    </div>
                    <div class="group">
                        <div class="relative aspect-[4/5] rounded-2xl overflow-hidden mb-6 bg-slate-200">
                            <img class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110" data-alt="Portrait of a female creative director with vibrant background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCggghNI5O9Z-CtAt9-NPZlHvqPMmwSPCDWz0daUH3E7flQxbGlIraFk7Sb6inh0uS3KfIftVwIz_QH8nMaBXmNAw03xk3VFSEkLOr0IZlNrLu8Yfm_hsZreA2GK9b5upVXbnGvorzSFqDZ6wt1W5THhLApogtSboynobwSL3pmYftcTzvnWL3RvVLEmPPRzcQ29EOHUpL92wB8cB-G1I4BsvDqgTDgEU7eyTsoveEABzik-3p-gBKxGBgq52Rb631TMhtCoXmCuPY" alt="">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 via-transparent to-transparent opacity-60"></div>
                            <div class="absolute bottom-4 left-4 flex gap-2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <a class="size-8 rounded-lg bg-white/20 flex items-center justify-center hover:bg-accent-blue transition-colors" href="#"><span class="material-symbols-outlined !text-sm text-white">share</span></a>
                            </div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900">Elena Rodriguez</h4>
                        <p class="text-accent-blue text-sm font-medium mb-2">Creative Director</p>
                        <p class="text-slate-600 text-sm">Shaping the visual identity and user experience.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to Action Footer Section -->
        <section class="py-24 px-6 lg:px-20 relative overflow-hidden">
            <div class="absolute inset-0 bg-primary/5 -z-10"></div>
            <div class="max-w-7xl mx-auto rounded-[2rem] bg-gradient-to-br from-primary to-accent-purple p-12 lg:p-20 text-center relative shadow-2xl">
                <div class="absolute top-0 right-0 p-8 opacity-5">
                    <span class="material-symbols-outlined !text-[12rem] rotate-12 text-white">code</span>
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tight">Ready to shape the future?</h2>
                <p class="text-xl text-white/90 max-w-2xl mx-auto mb-12">
                    Join our vibrant community of developers, designers, and innovators. Let's build something extraordinary together.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                    <button class="w-full sm:w-auto px-10 py-5 bg-white text-primary font-bold rounded-2xl hover:bg-slate-100 transition-all transform hover:scale-105 shadow-xl">Join the Community</button>
                    <button class="w-full sm:w-auto px-10 py-5 bg-white/10 text-white font-bold rounded-2xl border border-white/20 hover:bg-white/20 transition-all backdrop-blur-sm">View Schedule</button>
                </div>
            </div>
        </section>
    </main>

    <div class="about-footer-wrapper">
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
