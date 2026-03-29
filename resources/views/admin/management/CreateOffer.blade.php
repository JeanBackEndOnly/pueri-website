<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add Offers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="dashboard-card overflow-hidden">
                <div class="p-4 border-b border-white/10">
                    <a href="{{ route('admin.offer') }}" class="inline-flex items-center text-white/70 hover:text-white transition">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Our Offer Page
                    </a>
                </div>
                
                <form action="{{ route('admin.add.offer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="p-6 md:p-8">
                        <!-- Header with Image Upload -->
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 mb-8">
                            <!-- Image Upload -->
                            <div class="relative group">
                                <div class="relative w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-red-500/30 shadow-lg">
                                    <div class="absolute inset-0 bg-red-500 rounded-full blur-lg opacity-30 animate-pulse"></div>
                                    <img src="{{ asset('system_image/users.png') }}" 
                                         id="avatar-preview"
                                         alt=""
                                         class="relative w-full h-full object-cover">
                                </div> 
                                <label class="absolute inset-0 flex items-center justify-center bg-black/50 rounded-full opacity-0 group-hover:opacity-100 cursor-pointer transition-opacity">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <input type="file" name="image" class="hidden" accept="image/*" onchange="previewImage(this)">
                                </label>
                            </div>
                            
                            <!-- Form Fields -->
                            <div class="flex-1 space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-white/80 mb-1">Offer Title</label>
                                    <input type="text" name="offer_title" value="{{ old('offer_title') }}" 
                                           class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-white/80 mb-1">Time Available</label>
                                    <input type="text" name="time_available" value="{{ old('time_available') }}" 
                                           class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-white/80 mb-1">About this offer</label>
                                    <textarea name="description" rows="5"
                                        class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap justify-end gap-3 pt-6 border-t border-white/10">
                            <a href="{{ route('admin.offer') }}" 
                               class="px-4 py-2 bg-white/10 text-white/80 rounded-lg hover:bg-white/20 transition-colors">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md">
                                Add Offer
                            </button>
                        </div>
                    </div>
                </form> 
            </div>
        </div> 
    </div>
</x-app-layout>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('avatar-preview');
            preview.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>