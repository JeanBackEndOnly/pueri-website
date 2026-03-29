<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="dashboard-card overflow-hidden">
                <div class="p-4 border-b border-white/10">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-white/70 hover:text-white transition">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Dashboard
                    </a>
                </div>
                
                <form action="{{ $contact->isEmpty() ? route('admin.store.contact') : route('admin.update.contact', $contact->first()->id ?? '') }}" method="POST">
                    @csrf
                    @if(!$contact->isEmpty())
                        @method('PUT')
                    @endif
                    
                    <div class="p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Mobile Number -->
                            <div>
                                <label class="block text-sm font-medium text-white/80 mb-1">Mobile Number</label>
                                <input type="text" name="mobile" value="{{ old('mobile', $contact->first()->mobile ?? '') }}" 
                                       class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            </div>
                            
                            <!-- Phone Number -->
                            <div>
                                <label class="block text-sm font-medium text-white/80 mb-1">Phone Number</label>
                                <input type="text" name="phone" value="{{ old('phone', $contact->first()->phone ?? '') }}" 
                                       class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            </div>
                            
                            <!-- Email -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-white/80 mb-1">Email Address</label>
                                <input type="email" name="email" value="{{ old('email', $contact->first()->email ?? '') }}" 
                                       class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            </div>
                            
                            <!-- Address -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-white/80 mb-1">Address</label>
                                <textarea name="address" rows="4"
                                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ old('address', $contact->first()->address ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap justify-end gap-3 pt-6 border-t border-white/10 mt-6">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="px-4 py-2 bg-white/10 text-white/80 rounded-lg hover:bg-white/20 transition-colors">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md">
                                {{ $contact->isEmpty() ? 'Add Contact' : 'Update Contact' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>