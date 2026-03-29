<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Job Vacancies') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="dashboard-card overflow-hidden">
                
                <!-- Header -->
                <div class="flex justify-between items-center px-6 py-4 border-b border-white/10">
                    <h3 class="text-lg font-semibold text-white">Manage Job Vacancies</h3>
                    <a href="{{ route('admin.add.position.show') }}" 
                       class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-md">
                        + Add Job
                    </a>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    @if ($positions->isEmpty())
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-white/40 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-white/70 text-lg">No job vacancies available</p>
                            <p class="text-white/50 text-sm mt-1">Click "Add Job" to get started.</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($positions as $pos)
                                <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 overflow-hidden hover:bg-white/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl group">
                                    
                                    <!-- Header Badge -->
                                    <div class="px-4 py-3 border-b border-white/10 bg-white/5">
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs font-mono text-red-400 bg-red-500/20 px-2 py-1 rounded border border-red-500/30">
                                                {{ $pos->available_quantity }} slot(s) available
                                            </span>
                                            <span class="px-2 py-1 text-xs rounded-full
                                                @if($pos->availability == 'available') bg-green-500/20 text-green-400 border border-green-500/30
                                                @else bg-red-500/20 text-red-400 border border-red-500/30
                                                @endif">
                                                {{ ucfirst($pos->availability) }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="p-4">
                                        <h3 class="text-xl font-bold text-white mb-2">{{ $pos->position_name }}</h3>
                                        <p class="text-white/60 text-sm line-clamp-3 mb-4">{{ $pos->about_position }}</p>
                                        
                                        <!-- Actions -->
                                        <div class="flex justify-end gap-2 pt-3 border-t border-white/10">
                                            <a href="{{ route('admin.update.position.show', $pos->id) }}" 
                                               class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-md text-sm hover:bg-blue-500/30 transition-colors border border-blue-500/30">
                                                Edit
                                            </a>
                                            <a href="{{ route('admin.delete.position', $pos->id) }}" 
                                               class="px-3 py-1.5 bg-red-500/20 text-red-400 rounded-md text-sm hover:bg-red-500/30 transition-colors border border-red-500/30"
                                               onclick="return confirm('Delete this position vacancy?')">
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