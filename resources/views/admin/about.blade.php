<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manage About Us') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="dashboard-card overflow-hidden">
                
                <!-- Header -->
                <div class="flex justify-between items-center px-6 py-4 border-b border-white/10">
                    <h3 class="text-lg font-semibold text-white">Section/Unit Information</h3>
                    <a href="{{ route('admin.add.information.show') }}" 
                       class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-md">
                        + Add Information
                    </a>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    @if ($information->isEmpty())
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-white/40 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-white/70 text-lg">No department information available</p>
                            <p class="text-white/50 text-sm mt-1">Click "Add Information" to get started.</p>
                        </div>
                    @else
                        @foreach ($information as $info)
                            <!-- Section/Unit Card -->
                            <div class="mb-8 last:mb-0 dashboard-card overflow-hidden transition-all duration-300 hover:transform hover:-translate-y-1">
                                
                                <!-- Section/Unit Header -->
                                <div class="p-6 bg-gradient-to-r from-red-500/10 to-transparent border-b border-white/10">
                                    <div class="flex flex-col md:flex-row items-center gap-6">
                                        <!-- Logo -->
                                        <div class="flex-shrink-0">
                                            <div class="relative">
                                                <div class="absolute inset-0 bg-red-500 rounded-full blur-lg opacity-30 animate-pulse"></div>
                                                @if(isset($info->unit_image))
                                                    <img src="{{ Storage::disk('public')->url($info->profile) }}"
                                                         class="relative h-24 w-24 rounded-full object-cover border-4 border-red-500/30 shadow-md">
                                                @else
                                                    <img src="{{ asset('system_image/pueri-logo.png') }}" 
                                                         class="relative h-24 w-24 rounded-full object-cover border-4 border-red-500/30 shadow-md">
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <!-- Info -->
                                        <div class="flex-1 text-center md:text-left">
                                            <h2 class="text-2xl md:text-3xl font-bold text-white">{{ $info->unit_name }} Team</h2>
                                            <p class="text-lg text-red-400 font-medium">{{ $info->unit_code }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-white/70">
                                        {{ $info->unit_description }}
                                    </div>
                                </div>
                                
                                <!-- Team Members -->
                                <div class="p-6">
                                    <h3 class="text-md font-semibold text-white mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                        Team Members
                                    </h3>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach ($info->employee as $employee)
                                            <div class="bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 p-4 hover:bg-white/10 transition-all duration-200 group">
                                                <div class="flex items-center gap-4">
                                                    <!-- Avatar -->
                                                    <div class="flex-shrink-0">
                                                       <img src="{{ Storage::disk('public')->url($employee->profile) }}"
                                                             class="h-16 w-16 rounded-full object-cover border-2 border-red-500/30 group-hover:border-red-500 transition-colors">
                                                    </div>
                                                    
                                                    <!-- Info -->
                                                    <div class="flex-1">
                                                        <h4 class="font-bold text-white">{{ $employee->fname . ' ' . $employee->lname }}</h4>
                                                        <p class="text-red-400 text-sm font-medium">{{ $employee->position }}</p>
                                                        <p class="text-white/50 text-xs mt-1">Available: {{ $employee->time_available ?? 'Not set' }}</p>
                                                        
                                                        <!-- Action Buttons -->
                                                        <div class="flex gap-2 mt-2">
                                                            <a href="{{ route('admin.update.information.show', $employee->id) }}" 
                                                               class="text-blue-400 hover:text-blue-300 text-xs font-medium transition">Edit</a>
                                                            <a href="{{ route('admin.delete.information.show', $employee->id) }}" 
                                                               class="text-red-400 hover:text-red-300 text-xs font-medium transition"
                                                               onclick="return confirm('Delete this member?')">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>