<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <!-- Hero Section - Full Screen -->
            <div class="relative min-h-screen flex items-center justify-center -mt-20">
                <div class="relative z-10 text-center px-4 pt-12 sm:pt-0 lg:pt-0 md:pt-0 sm:px-6 lg:px-8 max-w-7xl mx-auto">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md rounded-full px-4 py-2 mb-8 border border-white/20">
                        <span class="relative flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                        </span>
                        <span class="text-white/90 text-sm font-medium">Since 1917 • Excellence in Childcare</span>
                    </div>
                    
                    <!-- Main Heading -->
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
                    
                    <!-- Description -->
                    <p class="text-xl md:text-2xl text-white/80 max-w-3xl mx-auto mb-12 leading-relaxed">
                        Providing quality healthcare and nurturing environment for children's growth and development since 1917. 
                        Where every child's health and happiness comes first.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                        <a href="{{ route('admin.about') }}" class="smooth-link group inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-red-500/25">
                            <span>Meet Our Team</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="{{ route('admin.offer') }}" class="group smooth-link inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 border border-white/20">
                            <span>Our Services</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-4xl mx-auto">
                        <div class="text-center">
                            <div class="text-3xl md:text-4xl font-bold text-white">100+</div>
                            <div class="text-white/60 text-sm mt-1">Expert Staff</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl md:text-4xl font-bold text-white">10+</div>
                            <div class="text-white/60 text-sm mt-1">Services Offered</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl md:text-4xl font-bold text-white">10k+</div>
                            <div class="text-white/60 text-sm mt-1">Happy Families</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl md:text-4xl font-bold text-white">50+</div>
                            <div class="text-white/60 text-sm mt-1">Years of Service</div>
                        </div>
                    </div>
                    
                    <!-- Scroll Indicator -->
                    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                        <a href="#services" class="block">
                            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
                                <div class="w-1 h-2 bg-white/50 rounded-full mt-2 animate-pulse"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
</x-app-layout>
