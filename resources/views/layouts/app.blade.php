<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            * {
                font-family: 'Inter', sans-serif;
            }
            
            body {
                background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #2d1a1a 100%);
                position: relative;
                min-height: 100vh;
            }
            
            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 1px);
                background-size: 40px 40px;
                pointer-events: none;
                z-index: 0;
            }
            
            /* Floating Shapes */
            .bg-shape {
                position: fixed;
                border-radius: 50%;
                filter: blur(80px);
                opacity: 0.15;
                z-index: 0;
                pointer-events: none;
            }
            
            /* Custom Card Styles */
            .dashboard-card {
                background: rgba(255,255,255,0.05);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255,255,255,0.1);
                border-radius: 1.5rem;
                transition: all 0.3s ease;
            }
            
            .dashboard-card:hover {
                background: rgba(255,255,255,0.08);
                transform: translateY(-5px);
                border-color: rgba(239,68,68,0.3);
            }
            
            /* Scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }
            
            ::-webkit-scrollbar-track {
                background: rgba(255,255,255,0.1);
                border-radius: 10px;
            }
            
            ::-webkit-scrollbar-thumb {
                background: #ef4444;
                border-radius: 10px;
            }
            
            ::-webkit-scrollbar-thumb:hover {
                background: #dc2626;
            }
            
            /* Text Colors */
            .text-gradient {
                background: linear-gradient(135deg, #fff 0%, #ef4444 100%);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }
        </style>
    </head>
    <body class="font-sans antialiased text-white">
        <!-- Floating Background Shapes -->
        <div class="bg-shape" style="width: 300px; height: 300px; background: radial-gradient(circle, #ef4444, transparent); top: 10%; left: -100px;"></div>
        <div class="bg-shape" style="width: 400px; height: 400px; background: radial-gradient(circle, #f97316, transparent); bottom: 20%; right: -150px;"></div>
        <div class="bg-shape" style="width: 250px; height: 250px; background: radial-gradient(circle, #3b82f6, transparent); top: 50%; left: 70%;"></div>
        
        <div class="relative z-10 min-h-screen">
            @include('layouts.navigation')
            @include('layouts.alert')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-black/30 backdrop-blur-md border-b border-white/10 shadow-lg">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="text-2xl font-bold text-white">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>