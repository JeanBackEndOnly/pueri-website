<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('We Offer') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="dashboard-card overflow-hidden">
                
                <!-- Header -->
                <div class="flex justify-between items-center px-6 py-4 border-b border-white/10">
                    <h3 class="text-lg font-semibold text-white">Manage Offers</h3>
                    <a href="{{ route('admin.add.offer.show') }}" 
                       class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-md">
                        + Add Offer
                    </a>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    @if ($offers->isEmpty())
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-white/40 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <p class="text-white/70 text-lg">No Offers available</p>
                            <p class="text-white/50 text-sm mt-1">Click "Add Offer" to get started.</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($offers as $offer)
                                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 overflow-hidden hover:bg-white/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl group">
                                    
                                    <!-- Image Section -->
                                    <div class="h-40 overflow-hidden bg-gradient-to-br from-red-900/20 to-red-800/20 relative">
                                        @if ($offer->image === null)
                                            <div class="w-full h-full flex items-center justify-center">
                                                <img src="{{ asset('system_image/pueri-logo.png') }}" class="h-20 w-20 opacity-30" alt="Puericulture">
                                            </div>
                                        @else
                                            <img src="{{ asset('storage/' . $offer->image) }}" 
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @endif
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-xl font-bold text-white">{{ $offer->offer_title }}</h3>
                                            <span class="text-xs font-mono text-red-400 bg-red-500/20 px-2 py-1 rounded border border-red-500/30">{{ $offer->time_available }}</span>
                                        </div>
                                        <p class="text-white/60 text-sm line-clamp-2 mb-4">{{ $offer->description }}</p>
                                        
                                        <!-- Actions -->
                                        <div class="flex justify-end gap-2 pt-3 border-t border-white/10">
                                            <a href="{{ route('admin.update.offer.show', $offer->id) }}" 
                                               class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-md text-sm hover:bg-blue-500/30 transition-colors border border-blue-500/30">
                                                Edit
                                            </a>
                                            <a href="{{ route('admin.delete.offer', $offer->id) }}" 
                                               class="px-3 py-1.5 bg-red-500/20 text-red-400 rounded-md text-sm hover:bg-red-500/30 transition-colors border border-red-500/30"
                                               onclick="return confirm('Delete this Offer?')">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>