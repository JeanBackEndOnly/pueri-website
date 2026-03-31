<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Puericulture Center') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="text-white">
    
    <!-- Floating Background Shapes -->
    <div class="bg-shape" style="width: 300px; height: 300px; background: radial-gradient(circle, #ef4444, transparent); top: 10%; left: -100px;"></div>
    <div class="bg-shape" style="width: 400px; height: 400px; background: radial-gradient(circle, #f97316, transparent); bottom: 20%; right: -150px;"></div>
    <div class="bg-shape" style="width: 250px; height: 250px; background: radial-gradient(circle, #3b82f6, transparent); top: 50%; left: 70%;"></div>
    
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-black/50 backdrop-blur-md border-b border-white/10 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-red-500 rounded-full blur-lg opacity-50 animate-pulse"></div>
                        <img src="{{ asset('system_image/pueri-logo.png') }}" class="relative h-10 w-10 md:h-12 md:w-12 object-contain" alt="Logo">
                    </div>
                    <a href="#">
                        <h1 class="font-bold text-lg md:text-xl text-white">
                            ZPuericultureC Org.144, Inc.
                        </h1>
                    </a>
                </div>
                
                @if (Route::has('login'))
                    <nav class="flex items-center gap-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-5 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-md">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-5 py-2 text-white/80 hover:text-white transition-colors font-medium">
                                Log in
                            </a>
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </header>

    <main class="relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-12 md:py-16 lg:py-20">
            
            <!-- Hero Section -->
            <div class="relative min-h-screen flex items-center justify-center -mt-20">
                <div class="relative z-10 text-center px-4 pt-12 sm:pt-0 lg:pt-0 md:pt-0 sm:px-6 lg:px-8 max-w-7xl mx-auto">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md rounded-full px-4 py-2 mb-8 border border-white/20">
                        <span class="relative flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                        </span>
                        <span class="text-white/90 text-sm font-medium">Since 1917 • Excellence in Childcare</span>
                    </div>
                    
                    <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold text-white mb-6 leading-tight">
                        Excellence in
                        <span class="relative inline-block">
                            <span class="relative z-10 text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-red-600">
                                Childcare
                            </span>
                            <svg class="absolute -bottom-2 left-0 w-full" viewBox="0 0 200 10" fill="none">
                                <path d="M0 5 L200 5" stroke="url(#gradient)" stroke-width="3" stroke-dasharray="8 8"/>
                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" stop-color="#ef4444"/>
                                        <stop offset="100%" stop-color="#f97316"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </span>
                    </h1>
                    
                    <p class="text-xl md:text-2xl text-white/80 max-w-3xl mx-auto mb-12 leading-relaxed">
                        Providing quality healthcare and nurturing environment for children's growth and development since 1917. 
                        Where every child's health and happiness comes first.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                        <a href="#get_our_team" class="smooth-link group inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-red-500/25">
                            <span>Meet Our Team</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="#services" class="smooth-link inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 border border-white/20">
                            <span>Our Services</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="#positions" class="smooth-link inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 border border-white/20">
                            <span>Career Opportunities</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="#contacts" class="smooth-link inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 border border-white/20">
                            <span>Get in Touch</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-4xl mx-auto">
                        <div class="text-center"><div class="text-3xl md:text-4xl font-bold text-white">100+</div><div class="text-white/60 text-sm mt-1">Expert Staff</div></div>
                        <div class="text-center"><div class="text-3xl md:text-4xl font-bold text-white">10+</div><div class="text-white/60 text-sm mt-1">Services Offered</div></div>
                        <div class="text-center"><div class="text-3xl md:text-4xl font-bold text-white">10k+</div><div class="text-white/60 text-sm mt-1">Happy Families</div></div>
                        <div class="text-center"><div class="text-3xl md:text-4xl font-bold text-white">50+</div><div class="text-white/60 text-sm mt-1">Years of Service</div></div>
                    </div>
                    
                    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                        <a href="#services" class="block"><div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center"><div class="w-1 h-2 bg-white/50 rounded-full mt-2 animate-pulse"></div></div></a>
                    </div>
                </div>
            </div>

            <!-- Offers Slider -->
            @if(isset($offers) && $offers->count())
                <div id="services" class="mb-20 scroll-mt-20">
                    <div class="text-center mb-12">
                        <span class="inline-block px-4 py-1 bg-red-500/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-3 border border-red-500/30">Our Services</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-3 section-title">What We Offer</h2>
                        <p class="text-white/60 mt-3">Comprehensive healthcare services tailored for your child's needs</p>
                    </div>
                    
                    <div class="max-w-4xl mx-auto px-4">
                        <div class="offers-slider-container relative">
                            <div class="offers-slider-track flex" id="offersSliderTrack">
                                @foreach ($offers as $offer)
                                    <div class="offers-slider-slide flex-shrink-0 w-full">
                                        <div class="offer-card max-w-2xl mx-auto bg-white/5 backdrop-blur-sm rounded-2xl overflow-hidden border border-white/10 hover:border-red-500/30 transition-all duration-300">
                                            <div class="relative h-64 overflow-hidden">
                                                @if($offer->image)
                                                    <img src="{{ Storage::disk('public')->url($offer->image) }}"
                                                        alt="{{ $offer->offer_title }}"
                                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                                        onerror="this.src='/system_image/users.png'">
                                                @else
                                                    <div class="w-full h-full bg-gradient-to-br from-red-900/30 to-red-800/30 flex items-center justify-center">
                                                        <span class="text-6xl">🏥</span>
                                                    </div>
                                                @endif
                                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                                                    <p class="text-white text-sm flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        {{ $offer->time_available ?? 'Flexible Schedule' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="p-6">
                                                <h3 class="text-xl font-bold text-white mb-2">{{ $offer->offer_title }}</h3>
                                                <p class="text-white/60 text-sm leading-relaxed">{{ $offer->description }}</p>
                                                @if($offer->price ?? false)
                                                    <div class="mt-4 pt-4 border-t border-white/10">
                                                        <span class="text-red-400 font-bold text-lg">₱{{ number_format($offer->price, 2) }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="slider-btn offers-slider-btn-prev" id="offersPrevBtn">←</button>
                            <button class="slider-btn offers-slider-btn-next" id="offersNextBtn">→</button>
                        </div>
                        <div class="offers-slider-dots flex justify-center gap-2 mt-6" id="offersSliderDots"></div>
                    </div>
                </div>
            @endif

            <!-- Team Section -->
            @if ($information->isNotEmpty())
                <div class="mb-16" id="get_our_team">
                    <div class="text-center mb-12">
                        <span class="inline-block px-4 py-1 bg-red-500/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-3 border border-red-500/30">Our Team</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-3 section-title">Meet Our Dedicated Staff</h2>
                        <p class="text-white/60 mt-3">Committed professionals ensuring the best care for your family</p>
                    </div>
                    
                    <div class="slider-container relative mb-8">
                        <div class="slider-track flex" id="sliderTrack">
                            @foreach ($information as $info)
                                <div class="slider-slide flex-shrink-0 w-full">
                                    <div class="bg-white/5 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden mx-4 border border-white/10">
                                        <div class="flex flex-col lg:flex-row items-center gap-8 p-8 lg:p-10">
                                            <div class="relative flex-shrink-0">
                                                <div class="absolute inset-0 bg-red-500 rounded-full blur-xl opacity-30 animate-pulse"></div>
                                                <div class="relative w-32 h-32 lg:w-40 lg:h-40 rounded-full overflow-hidden border-4 border-red-500/30 shadow-xl">
                                                    @if($info->unit_image)
                                                        <img src="{{ Storage::disk('public')->url($info->unit_image) }}"
                                                            class="w-full h-full object-cover"
                                                            onerror="this.src='/system_image/pueri-logo.png'">
                                                    @else
                                                        <img src="{{ asset('system_image/pueri-logo.png') }}" 
                                                            class="w-full h-full object-cover p-4 bg-white/10">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-1 text-center lg:text-left">
                                                <h3 class="text-3xl lg:text-4xl font-bold text-white mb-2">
                                                    {{ $info->unit_name }}
                                                    <span class="text-red-500">Team</span>
                                                </h3>
                                                <div class="inline-block px-4 py-1 bg-red-500/20 rounded-full mb-3">
                                                    <span class="text-red-400 font-mono text-sm font-semibold">{{ $info->unit_code }}</span>
                                                </div>
                                                <p class="text-white/70 leading-relaxed">{{ $info->unit_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="slider-btn slider-btn-prev" id="prevBtn">←</button>
                        <button class="slider-btn slider-btn-next" id="nextBtn">→</button>
                    </div>
                    <div class="slider-dots" id="sliderDots"></div>
                </div>

                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-center text-white mb-8" id="teamTitle">Team Members</h2>
                    <div id="membersContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8"></div>
                </div>
            @else
                <div class="text-center py-20 bg-white/5 backdrop-blur-sm rounded-3xl">
                    <div class="text-7xl mb-5">👥</div>
                    <p class="text-white/70 text-xl">No team information available.</p>
                </div>
            @endif

            <!-- Job Vacancies Slider -->
            @if(isset($jobs) && $jobs->count())
                <div class="mt-20" id="positions">
                    <div class="text-center mb-12">
                        <span class="inline-block px-4 py-1 bg-red-500/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-3 border border-red-500/30">Career Opportunities</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-3 section-title">Join Our Team</h2>
                        <p class="text-white/60 mt-3">Be part of our mission to provide excellent childcare services</p>
                    </div>
                    
                    <div class="jobs-slider-container relative">
                        <div class="jobs-slider-track flex" id="jobsSliderTrack">
                            @foreach ($jobs as $job)
                                <div class="jobs-slider-slide flex-shrink-0 w-full">
                                    <div class="bg-white/5 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden mx-4 border border-white/10">
                                        <div class="p-8 lg:p-10">
                                            <div class="flex flex-col items-center text-center">
                                                <div class="w-20 h-20 bg-gradient-to-br from-red-500/20 to-red-600/20 rounded-full flex items-center justify-center mb-5">
                                                    <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                <h3 class="text-2xl lg:text-3xl font-bold text-white mb-3">{{ $job->position_name }}</h3>
                                                <div class="flex flex-wrap justify-center gap-3 mb-5">
                                                    <span class="px-4 py-1.5 bg-blue-500/20 text-blue-300 rounded-full text-sm font-semibold">📍 {{ $job->available_quantity }} slot(s) available</span>
                                                    <span class="px-4 py-1.5 rounded-full text-sm font-semibold @if($job->availability == 'available') bg-green-500/20 text-green-300 @else bg-red-500/20 text-red-300 @endif">{{ ucfirst($job->availability) }}</span>
                                                </div>
                                                <p class="text-white/70 leading-relaxed max-w-2xl">{{ $job->about_position }}</p>
                                                @if($job->availability == 'available')
                                                    <div class="mt-7">
                                                        <a href="{{ route('apply.job', $job->id) }}" class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-md">Apply Now
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="mt-7"><span class="inline-flex items-center gap-2 bg-white/10 text-white/50 px-8 py-3 rounded-xl font-semibold cursor-not-allowed">No Slots Available</span></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="slider-btn jobs-slider-btn-prev" id="jobsPrevBtn">←</button>
                        <button class="slider-btn jobs-slider-btn-next" id="jobsNextBtn">→</button>
                    </div>
                    <div class="jobs-slider-dots flex justify-center gap-2 mt-6" id="jobsSliderDots"></div>
                </div>
            @endif

            <!-- Contact Section -->
            @if(isset($contact) && $contact)
                <div class="mt-20 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8" id="contacts">
                    <div class="text-center mb-12">
                        <span class="inline-block px-4 py-1 bg-red-500/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-3 border border-red-500/30">📞 Get in Touch</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">Connect with Us</h2>
                        <p class="text-white/60 max-w-xl mx-auto">Have questions or need assistance? Reach out to us — we're here to help.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($contact->mobile)
                        <div class="group bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center group-hover:bg-red-500/30 transition">
                                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </div>
                                <div><p class="text-white/40 text-xs uppercase tracking-wider mb-1">Mobile</p><p class="text-white text-lg font-semibold">{{ $contact->mobile }}</p><p class="text-white/40 text-sm mt-1">Available 24/7</p></div>
                            </div>
                        </div>
                        @endif

                        @if($contact->phone)
                        <div class="group bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center group-hover:bg-red-500/30 transition">
                                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <div><p class="text-white/40 text-xs uppercase tracking-wider mb-1">Phone</p><p class="text-white text-lg font-semibold">{{ $contact->phone }}</p><p class="text-white/40 text-sm mt-1">Mon-Fri, 8am-5pm</p></div>
                            </div>
                        </div>
                        @endif

                        @if($contact->email)
                        <div class="group bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center group-hover:bg-red-500/30 transition">
                                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div class="flex-1 break-words"><p class="text-white/40 text-xs uppercase tracking-wider mb-1">Email</p><p class="text-white text-lg font-semibold break-all">{{ $contact->email }}</p><p class="text-white/40 text-sm mt-1">We'll respond within 24h</p></div>
                            </div>
                        </div>
                        @endif

                        @if($contact->address)
                        <div class="group bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-300 hover:-translate-y-1 md:col-span-2">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center group-hover:bg-red-500/30 transition">
                                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div class="flex-1"><p class="text-white/40 text-xs uppercase tracking-wider mb-1">Address</p><p class="text-white text-lg font-semibold">{{ $contact->address }}</p><p class="text-white/40 text-sm mt-1">Visit us during business hours</p></div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="text-center mt-8">
                        <a href="https://www.google.com/maps/place/Zamboanga+Puericulture+Center+Maternity+Lying-in+Hospital/@6.9071992,122.0730394,17z/data=!3m1!4b1!4m6!3m5!1s0x3250426b2b2d3f29:0x6b4ede3b0b21729!8m2!3d6.9071939!4d122.0756143!16s%2Fg%2F11b66fv081?entry=ttu&g_ep=EgoyMDI2MDMyNC4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="inline-flex items-center gap-2 text-white/60 hover:text-white transition text-sm">
                            <span>View on Google Maps</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </main>

    <footer class="relative z-10 bg-black/30 border-t border-white/10 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center"><p class="text-white/50 text-sm">© {{ date('Y') }} Puericulture Center. All rights reserved.</p></div>
        </div>
    </footer>

    <script>
        // Storage URL helper
        const storageUrl = "{{ Storage::disk('public')->url('') }}";
        
        document.addEventListener('DOMContentLoaded', function() {
            // Global image error handler
            document.querySelectorAll('img').forEach(img => {
                img.onerror = function() { this.src = '/system_image/users.png'; this.onerror = null; };
            });
        });

        // Pass data to JavaScript
        const offersData = @json($offers ?? []);
        const sectionsData = @json($information ?? []);
        const jobsData = @json($jobs ?? []);
        
        // Offers Slider
        if (offersData.length > 0) {
            let offersCurrentIndex = 0;
            const offersTotalSlides = offersData.length;
            const offersTrack = document.getElementById('offersSliderTrack');
            const offersPrevBtn = document.getElementById('offersPrevBtn');
            const offersNextBtn = document.getElementById('offersNextBtn');
            const offersDotsContainer = document.getElementById('offersSliderDots');
            let offersAutoSlide;
            
            function offersUpdateSlider() {
                if (offersTrack) offersTrack.style.transform = `translateX(-${offersCurrentIndex * 100}%)`;
                if (offersDotsContainer) {
                    document.querySelectorAll('#offersSliderDots .slider-dot').forEach((dot, i) => {
                        dot.classList.toggle('active', i === offersCurrentIndex);
                    });
                }
            }
            
            function offersGoToSlide(index) { offersCurrentIndex = index; offersUpdateSlider(); }
            function offersNextSlide() { offersCurrentIndex = (offersCurrentIndex + 1) % offersTotalSlides; offersUpdateSlider(); }
            function offersPrevSlide() { offersCurrentIndex = (offersCurrentIndex - 1 + offersTotalSlides) % offersTotalSlides; offersUpdateSlider(); }
            
            if (offersDotsContainer) {
                for (let i = 0; i < offersTotalSlides; i++) {
                    const dot = document.createElement('div');
                    dot.classList.add('slider-dot');
                    if (i === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => offersGoToSlide(i));
                    offersDotsContainer.appendChild(dot);
                }
            }
            
            if (offersPrevBtn && offersNextBtn) {
                offersPrevBtn.addEventListener('click', offersPrevSlide);
                offersNextBtn.addEventListener('click', offersNextSlide);
            }
            
            offersAutoSlide = setInterval(offersNextSlide, 5000);
            const offersContainer = document.querySelector('.offers-slider-container');
            if (offersContainer) {
                offersContainer.addEventListener('mouseenter', () => clearInterval(offersAutoSlide));
                offersContainer.addEventListener('mouseleave', () => { offersAutoSlide = setInterval(offersNextSlide, 5000); });
            }
        }
        
        // Team Slider
        if (sectionsData.length > 0) {
            let currentIndex = 0;
            const totalSlides = sectionsData.length;
            const track = document.getElementById('sliderTrack');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const dotsContainer = document.getElementById('sliderDots');
            const membersContainer = document.getElementById('membersContainer');
            const teamTitle = document.getElementById('teamTitle');
            let autoSlide;
            
            if (dotsContainer) {
                for (let i = 0; i < totalSlides; i++) {
                    const dot = document.createElement('div');
                    dot.classList.add('slider-dot');
                    if (i === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => goToSlide(i));
                    dotsContainer.appendChild(dot);
                }
            }
            
            function getImageUrl(profile) {
                if (!profile) return '/system_image/users.png';
                if (profile.startsWith('http')) return profile;
                return storageUrl + profile;
            }
            
            function renderMembers(sectionIndex) {
                const section = sectionsData[sectionIndex];
                if (!section || !section.employee || section.employee.length === 0) {
                    membersContainer.innerHTML = `<div class="col-span-full text-center py-12 text-white/50">No members in this section yet.</div>`;
                    return;
                }
                
                const members = section.employee;
                teamTitle.textContent = `${section.unit_name} Team Members`;
                
                let html = '';
                members.forEach((member, idx) => {
                    const fullName = `${member.fname} ${member.mname ? member.mname.charAt(0) + '. ' : ''}${member.lname} ${member.suffix || ''}`.trim();
                    const profileUrl = getImageUrl(member.profile);
                    html += `
                        <a href="/profile/${member.id}" 
                            class="group bg-white/5 backdrop-blur-sm rounded-2xl hover:bg-white/10 transition-all duration-500 hover:-translate-y-2 cursor-pointer overflow-hidden border border-white/10 block"
                            style="animation-delay: ${idx * 0.05}s">
                            <div class="relative h-64 overflow-hidden">
                                <img src="${profileUrl}" alt="${fullName}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" onerror="this.src='/system_image/users.png'">
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-red-600 to-transparent p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-400">
                                    <p class="text-white text-sm font-medium flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        ${member.time_available || 'Flexible Schedule'}
                                    </p>
                                </div>
                            </div>
                            <div class="p-5 text-center">
                                <h3 class="text-lg font-bold text-white mb-1">${fullName}</h3>
                                <p class="text-red-400 font-medium text-sm">${member.position}</p>
                                <div class="w-12 h-0.5 bg-red-500/50 mx-auto mt-4 group-hover:w-16 transition-all duration-300"></div>
                            </div>
                        </a>
                    `;
                });
                membersContainer.innerHTML = html;
                
                // Add error handlers for new images
                membersContainer.querySelectorAll('img').forEach(img => {
                    img.onerror = function() { this.src = '/system_image/users.png'; this.onerror = null; };
                });
            }
            
            function updateSlider() {
                if (track) track.style.transform = `translateX(-${currentIndex * 100}%)`;
                if (dotsContainer) {
                    document.querySelectorAll('#sliderDots .slider-dot').forEach((dot, i) => {
                        dot.classList.toggle('active', i === currentIndex);
                    });
                }
                renderMembers(currentIndex);
            }
            
            function goToSlide(index) { currentIndex = index; updateSlider(); }
            function nextSlide() { currentIndex = (currentIndex + 1) % totalSlides; updateSlider(); }
            function prevSlide() { currentIndex = (currentIndex - 1 + totalSlides) % totalSlides; updateSlider(); }
            
            if (prevBtn && nextBtn) {
                prevBtn.addEventListener('click', prevSlide);
                nextBtn.addEventListener('click', nextSlide);
            }
            
            renderMembers(0);
            
            autoSlide = setInterval(nextSlide, 6000);
            const sliderContainer = document.querySelector('.slider-container');
            if (sliderContainer) {
                sliderContainer.addEventListener('mouseenter', () => clearInterval(autoSlide));
                sliderContainer.addEventListener('mouseleave', () => { autoSlide = setInterval(nextSlide, 6000); });
            }
        }
        
        // Job Slider
        if (jobsData.length > 0) {
            let jobsCurrentIndex = 0;
            const jobsTotalSlides = jobsData.length;
            const jobsTrack = document.getElementById('jobsSliderTrack');
            const jobsPrevBtn = document.getElementById('jobsPrevBtn');
            const jobsNextBtn = document.getElementById('jobsNextBtn');
            const jobsDotsContainer = document.getElementById('jobsSliderDots');
            let jobsAutoSlide;
            
            function jobsUpdateSlider() {
                if (jobsTrack) jobsTrack.style.transform = `translateX(-${jobsCurrentIndex * 100}%)`;
                if (jobsDotsContainer) {
                    document.querySelectorAll('#jobsSliderDots .slider-dot').forEach((dot, i) => {
                        dot.classList.toggle('active', i === jobsCurrentIndex);
                    });
                }
            }
            
            function jobsGoToSlide(index) { jobsCurrentIndex = index; jobsUpdateSlider(); }
            function jobsNextSlide() { jobsCurrentIndex = (jobsCurrentIndex + 1) % jobsTotalSlides; jobsUpdateSlider(); }
            function jobsPrevSlide() { jobsCurrentIndex = (jobsCurrentIndex - 1 + jobsTotalSlides) % jobsTotalSlides; jobsUpdateSlider(); }
            
            if (jobsDotsContainer) {
                for (let i = 0; i < jobsTotalSlides; i++) {
                    const dot = document.createElement('div');
                    dot.classList.add('slider-dot');
                    if (i === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => jobsGoToSlide(i));
                    jobsDotsContainer.appendChild(dot);
                }
            }
            
            if (jobsPrevBtn && jobsNextBtn) {
                jobsPrevBtn.addEventListener('click', jobsPrevSlide);
                jobsNextBtn.addEventListener('click', jobsNextSlide);
            }
            
            jobsAutoSlide = setInterval(jobsNextSlide, 5000);
            const jobsContainer = document.querySelector('.jobs-slider-container');
            if (jobsContainer) {
                jobsContainer.addEventListener('mouseenter', () => clearInterval(jobsAutoSlide));
                jobsContainer.addEventListener('mouseleave', () => { jobsAutoSlide = setInterval(jobsNextSlide, 5000); });
            }
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>