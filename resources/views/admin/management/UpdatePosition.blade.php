<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Update Job Vacancy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="dashboard-card overflow-hidden">
            
                <div class="p-4 border-b border-white/10">
                    <a href="{{ route('admin.position') }}" class="inline-flex items-center text-white/70 hover:text-white transition">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Position Vacancies
                    </a>
                </div>
                
                <form action="{{ route('admin.update.position', $job->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-6 md:p-8">
                        
                        <!-- Position Field -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-white/80 mb-1">Position</label>
                            <input type="text" name="position_name" value="{{ $job->position_name }}" 
                                   class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                        
                        <!-- Available Quantity -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-white/80 mb-1">Available Quantity</label>
                            <input type="number" name="available_quantity" value="{{ $job->available_quantity }}" 
                                   class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                        
                        <!-- Availability Status -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-white/80 mb-1">Availability Status</label>
                            <select name="availability" class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option value="available" {{ $job->availability == 'available' ? 'selected' : '' }} class="bg-gray-800">Available</option>
                                <option value="full" {{ $job->availability == 'full' ? 'selected' : '' }} class="bg-gray-800">Full / No Slots</option>
                            </select>
                        </div>
                        
                        <!-- Description -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-white/80 mb-1">Position Description</label>
                            <textarea name="about_position" rows="6"
                                      class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ $job->about_position }}</textarea>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap justify-end gap-3 pt-6 border-t border-white/10">
                            <a href="{{ route('admin.position') }}" 
                               class="px-4 py-2 bg-white/10 text-white/80 rounded-lg hover:bg-white/20 transition-colors">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md">
                                Update Job Vacancy
                            </button>
                        </div>
                    </div>
                </form> 
                
            </div>
        </div> 
    </div>
</x-app-layout>