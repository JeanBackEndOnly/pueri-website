<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile | {{ $profile->fname }} {{ $profile->lname }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen">
    
    <!-- Custom Header -->
    <header class="sticky top-0 z-50 bg-black/50 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-red-500 rounded-full blur-lg opacity-50 animate-pulse"></div>
                        <img src="{{ asset('system_image/pueri-logo.png') }}" class="relative h-9 w-auto" alt="Logo">
                    </div>
                    <span class="font-bold text-lg text-white">ZPuericultureC Org. no.144, Inc.</span>
                </div>
                <a href="{{ route('index') }}" class="text-sm text-white/70 hover:text-white transition">Back to Home</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 overflow-hidden shadow-2xl">
                
                <div class="p-6 md:p-8">
                    <!-- Profile Header -->
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6 mb-8">
                        <!-- Profile Image -->
                        <div class="relative">
                            <div class="relative w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-red-500/30 shadow-lg">
                                <div class="absolute inset-0 bg-red-500 rounded-full blur-lg opacity-30 animate-pulse"></div>
                                @if(isset($profile->profile))   
                                    <img src="{{ Storage::disk('public')->url($profile->profile) }}"
                                         alt="{{ $profile->fname }} {{ $profile->lname }}"
                                         class="relative w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('system_image/users.png') }}" 
                                         alt="Default Avatar"
                                         class="relative w-full h-full object-cover p-8 bg-white/5">
                                @endif
                            </div>
                        </div>
                        
                        <!-- Basic Info -->
                        <div class="flex-1 text-center md:text-left">
                            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">
                                {{ $profile->fname }} {{ $profile->mname ? $profile->mname . ' ' : '' }}{{ $profile->lname }} {{ $profile->suffix }}
                            </h1>
                            <div class="inline-block px-4 py-1 bg-red-500/20 rounded-full mb-3">
                                <span class="text-red-400 font-medium text-sm">{{ $profile->position }}</span>
                            </div>
                            <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                                @if($profile->unit)
                                    <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-xs border border-purple-500/30">
                                        {{ $profile->unit->unit_name }}
                                    </span>
                                @endif
                                <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-xs border border-blue-500/30">
                                    Member since {{ $profile->created_at->format('M Y') }}
                                </span>
                                @if($profile->time_available)
                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs border border-green-500/30">
                                        ⏰ {{ $profile->time_available }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- About Section -->
                    @if($profile->about)
                        <div class="mb-8 break-all">
                            <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20">About</h3>
                            <div class="bg-white/5 rounded-lg p-5 border border-white/10">
                                <p class="text-white/80 leading-relaxed">{{ $profile->about }}</p>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Unit Information -->
                    @if($profile->unit)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20">Unit Information</h3>
                            <div class="bg-gradient-to-r from-red-500/10 to-purple-500/10 rounded-lg p-5 border border-white/10">
                                <div class="flex items-start gap-4">
                                    @if($profile->unit->unit_image)
                                        <div class="flex-shrink-0">
                                             <img src="{{ Storage::disk('public')->url($profile->unit->unit_image) }}"
                                                 alt="{{ $profile->unit->unit_name }}"
                                                 class="w-16 h-16 rounded-lg object-cover border border-white/20">
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <div class="flex flex-wrap items-center gap-2 mb-2">
                                            <h4 class="text-xl font-bold text-white">{{ $profile->unit->unit_name }}</h4>
                                            <span class="px-2 py-0.5 bg-white/10 text-white/60 rounded text-xs font-mono">{{ $profile->unit->unit_code }}</span>
                                        </div>
                                        <p class="text-white/70 text-sm leading-relaxed">{{ $profile->unit->unit_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Details Section -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20">Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center gap-3 text-white/70">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>{{ $profile->fname }} {{ $profile->lname }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-white/70">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ $profile->email ?? 'No email provided' }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-white/70">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span>{{ $profile->contact ?? 'No contact provided' }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20">Timeline</h3>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <div class="flex-1">
                                    <p class="text-white/80">Joined Organization</p>
                                    <p class="text-white/50 text-sm">{{ isset($profile->joined_at) ? \Carbon\Carbon::parse($profile->joined_at)->format('M d Y') : 'NO DATA' }}</p>
                                </div>
                            </div>
                            {{-- <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="flex-1">
                                    <p class="text-white/80">Last Updated</p>
                                    <p class="text-white/50 text-sm">{{ $profile->updated_at->format('F d, Y \a\t h:i A') }}</p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle all images that fail to load
            document.querySelectorAll('img').forEach(img => {
                img.onerror = function() {
                    this.src = '/system_image/users.png';
                    this.onerror = null; // Prevent infinite loop
                };
            });
        });
    </script>
    <!-- Alpine.js for any interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>