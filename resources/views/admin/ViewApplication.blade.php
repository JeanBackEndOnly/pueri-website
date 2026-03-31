<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Application Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="dashboard-card overflow-hidden">
                
                <!-- Back Button -->
                <div class="p-4 border-b border-white/10">
                    <a href="{{ route('admin.application') }}" class="inline-flex items-center text-white/70 hover:text-white transition">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Applications
                    </a>
                </div>
                
                <div class="p-6 md:p-8">
                    <!-- Profile Header -->
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6 mb-8">
                        <!-- Profile Image -->
                        <div class="relative">
                            <div class="relative w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-red-500/30 shadow-lg">
                                <div class="absolute inset-0 bg-red-500 rounded-full blur-lg opacity-30 animate-pulse"></div>
                                <img src="{{ asset('system_image/users.png') }}" 
                                     alt="Profile"
                                     class="relative w-full h-full object-cover">
                            </div>
                        </div>
                        
                        <!-- Basic Info -->
                        <div class="flex-1 text-center md:text-left">
                            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">
                                {{ $applicant->fname }} {{ $applicant->mname }} {{ $applicant->lname }} {{ $applicant->suffix }}
                            </h1>
                            <div class="inline-block px-4 py-1 bg-red-500/20 rounded-full mb-3">
                                <span class="text-red-400 font-medium text-sm">{{ $applicant->position->position_name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                                <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs border border-green-500/30">
                                    Applied {{ $applicant->created_at->diffForHumans() }}
                                </span>
                                <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-xs border border-blue-500/30">
                                    {{ ucfirst($applicant->sex) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20">Contact Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center gap-3 text-white/70">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ $applicant->email }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-white/70">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span>{{ $applicant->contact }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-white/70 md:col-span-2">
                                <svg class="w-5 h-5 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>{{ $applicant->address }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Work Experience -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20">Work Experience</h3>
                        @if($applicant->workExperiences && $applicant->workExperiences->count() > 0)
                            <div class="space-y-4">
                                @foreach($applicant->workExperiences as $exp)
                                    <div class="bg-white/5 rounded-lg p-4 border border-white/10 hover:bg-white/10 transition-all">
                                        <div class="flex flex-col md:flex-row justify-between md:items-center mb-2">
                                            <h4 class="text-lg font-semibold text-white">{{ $exp->position }}</h4>
                                            <span class="text-sm text-red-400">{{ $exp->years }} years</span>
                                        </div>
                                        <p class="text-white/70">{{ $exp->company_name }}</p>
                                        <p class="text-white/50 text-sm mt-1">{{ $exp->company_address }}</p>
                                        <p class="text-white/50 text-sm">Contact: {{ $exp->company_contact }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 bg-white/5 rounded-lg border border-white/10">
                                <p class="text-white/50">No work experience provided</p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Attachments -->
                    @if($applicant->files && $applicant->files->count() > 0)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20">Attachments</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($applicant->files as $file)
                                    @php
                                        $fileExtension = pathinfo($file->file, PATHINFO_EXTENSION);
                                        $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                        $isPdf = strtolower($fileExtension) == 'pdf';
                                    @endphp
                                    
                                    <div x-data="{ showPreview: false }" class="relative">
                                        <!-- File Card -->
                                        <div class="flex items-center justify-between p-3 bg-white/5 rounded-lg border border-white/10 hover:bg-white/10 transition-all group cursor-pointer"
                                            @click="showPreview = true">
                                            <div class="flex items-center gap-3">
                                                @if($isImage)
                                                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                @elseif($isPdf)
                                                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                    </svg>
                                                @else
                                                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                @endif
                                                <div>
                                                    <span class="text-white/80 group-hover:text-white transition">{{ $file->file_name }}</span>
                                                    <p class="text-white/40 text-xs">{{ strtoupper($fileExtension) }} file</p>
                                                </div>
                                            </div>
                                            <svg class="w-5 h-5 text-white/50 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </div>
                                        
                                        <!-- Modal Preview -->
                                        <div x-show="showPreview" 
                                            x-cloak
                                            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90 backdrop-blur-sm"
                                            @click.away="showPreview = false"
                                            @keydown.escape.window="showPreview = false">
                                            
                                            <div class="relative max-w-4xl w-full max-h-[90vh] bg-gray-900 rounded-xl overflow-hidden shadow-2xl">
                                                <!-- Modal Header -->
                                                <div class="flex justify-between items-center p-4 border-b border-white/10 bg-gray-800/50">
                                                    <h3 class="text-lg font-semibold text-white">{{ $file->file_name }}</h3>
                                                    <button @click="showPreview = false" class="text-white/70 hover:text-white transition">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                
                                                <!-- Modal Content -->
                                                <div class="p-4 overflow-auto max-h-[calc(90vh-80px)]">
                                                    @if($isImage)
                                                        <img src="{{ Storage::disk('public')->url($file->file) }}" 
                                                            alt="{{ $file->file_name }}"
                                                            class="max-w-full h-auto mx-auto rounded-lg">
                                                    @elseif($isPdf)
                                                        <iframe src="{{ Storage::disk('public')->url($file->file) }}#toolbar=0&navpanes=0" 
                                                                class="w-full h-[70vh] rounded-lg"
                                                                frameborder="0"></iframe>
                                                    @else
                                                        <div class="text-center py-12">
                                                            <svg class="w-24 h-24 text-white/30 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                            </svg>
                                                            <p class="text-white/50 mb-4">Preview not available for this file type</p>
                                                            <a href="{{ Storage::disk('public')->url($file->file) }}" 
                                                            download
                                                            class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                                </svg>
                                                                Download File
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                                <!-- Modal Footer -->
                                                <div class="flex justify-end gap-3 p-4 border-t border-white/10 bg-gray-800/50">
                                                    <a href="{{ asset('storage/' . $file->file) }}" 
                                                    download
                                                    class="px-4 py-2 bg-blue-500/20 text-blue-400 rounded-lg hover:bg-blue-500/30 transition border border-blue-500/30">
                                                        Download
                                                    </a>
                                                    <button @click="showPreview = false"
                                                            class="px-4 py-2 bg-white/10 text-white/80 rounded-lg hover:bg-white/20 transition">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif


                    
                    <!-- Application Timeline -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20">Application Timeline</h3>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <div class="flex-1">
                                    <p class="text-white/80">Application Submitted</p>
                                    <p class="text-white/50 text-sm">{{ $applicant->created_at->format('F d, Y \a\t h:i A') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="flex-1">
                                    <p class="text-white/80">Last Updated</p>
                                    <p class="text-white/50 text-sm">{{ $applicant->updated_at->format('F d, Y \a\t h:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-wrap justify-end gap-3 pt-6 border-t border-white/10">
                        <a href="{{ route('admin.application') }}" 
                           class="px-4 py-2 bg-white/10 text-white/80 rounded-lg hover:bg-white/20 transition-colors">
                            Close
                        </a>
                        <a href="mailto:{{ $applicant->email }}" 
                           class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md">
                            Contact Applicant
                        </a>
                        <button type="button"
                                onclick="confirmDelete('{{ route('admin.delete.application.redirect', $applicant->id) }}')"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md">
                            Delete Application
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
function confirmDelete(url) {
    if (confirm('Are you sure you want to delete this application? This action cannot be undone.')) {
        window.location.href = url;
    }
}
</script>
<!-- Add Alpine.js if not already included -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
[x-cloak] { display: none !important; }
</style>