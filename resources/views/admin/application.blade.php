<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Applications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="dashboard-card overflow-hidden">
                
                <!-- Header -->
                <div class="px-6 py-4 border-b border-white/10">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <h3 class="text-lg font-semibold text-white">Job Applications</h3>
                        
                        <!-- Search and Filter -->
                        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                            <!-- Position Filter -->
                            <select id="positionFilter" class="bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option value="all" class="bg-gray-800">All Positions</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}" class="bg-gray-800">{{ $position->position_name }}</option>
                                @endforeach
                            </select>
                            
                            <!-- Search Input -->
                            <div class="relative">
                                <input type="text" 
                                       id="searchInput" 
                                       placeholder="Search by name or email..." 
                                       class="bg-white/10 border border-white/20 rounded-lg px-4 py-2 pl-10 text-white focus:ring-2 focus:ring-red-500 focus:border-transparent w-full md:w-64">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    @if ($applications->isEmpty())
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-white/40 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-white/70 text-lg">No applications yet</p>
                            <p class="text-white/50 text-sm mt-1">Applications will appear here when submitted.</p>
                        </div>
                    @else
                        <div id="applicationsContainer" class="space-y-6">
                            @foreach ($applications as $form)
                                <div class="application-item bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 overflow-hidden hover:bg-white/10 transition-all duration-300"
                                     data-position-id="{{ $form->position_id }}"
                                     data-name="{{ strtolower($form->fname . ' ' . $form->lname . ' ' . $form->email) }}">
                                    
                                    <!-- Header Badge -->
                                    <div class="px-6 py-4 border-b border-white/10 bg-white/5">
                                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3">
                                            <div class="flex items-center gap-4">
                                                <div class="relative">
                                                    <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-red-500/30">
                                                        <img src="{{ asset('system_image/users.png') }}" 
                                                             alt="Profile"
                                                             class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-bold text-white">{{ $form->fname }} {{ $form->lname }}</h3>
                                                    <p class="text-sm text-white/60">{{ $form->email }} • {{ $form->contact }}</p>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap gap-2">
                                                <span class="px-3 py-1 text-xs rounded-full bg-blue-500/20 text-blue-400 border border-blue-500/30">
                                                    {{ $form->position->position_name ?? 'N/A' }}
                                                </span>
                                                <span class="px-3 py-1 text-xs rounded-full bg-green-500/20 text-green-400 border border-green-500/30">
                                                    Applied {{ $form->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="p-6">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <!-- Personal Info -->
                                            <div>
                                                <h4 class="text-sm font-semibold text-white/80 mb-3 flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                    </svg>
                                                    Personal Information
                                                </h4>
                                                <div class="space-y-2">
                                                    <p class="text-sm text-white/60">
                                                        <span class="font-medium text-white/80">Sex:</span> 
                                                        {{ ucfirst($form->sex) }}
                                                    </p>
                                                    <p class="text-sm text-white/60">
                                                        <span class="font-medium text-white/80">Address:</span> 
                                                        {{ Str::limit($form->address, 80) }}
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <!-- Work Experience Summary -->
                                            <div>
                                                <h4 class="text-sm font-semibold text-white/80 mb-3 flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                    </svg>
                                                    Work Experience
                                                </h4>
                                                @if($form->workExperiences && $form->workExperiences->count() > 0)
                                                    <div class="space-y-2">
                                                        @foreach($form->workExperiences->take(2) as $exp)
                                                            <div class="text-sm text-white/60">
                                                                <span class="font-medium text-white/80">{{ $exp->position }}</span> at {{ $exp->company_name }}
                                                                <span class="text-xs text-white/40">({{ $exp->years }} yrs)</span>
                                                            </div>
                                                        @endforeach
                                                        @if($form->workExperiences->count() > 2)
                                                            <p class="text-xs text-white/40">+{{ $form->workExperiences->count() - 2 }} more experience(s)</p>
                                                        @endif
                                                    </div>
                                                @else
                                                    <p class="text-sm text-white/50">No work experience provided</p>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <!-- Attachments Summary -->
                                        @if($form->files && $form->files->count() > 0)
                                            <div class="mt-4 pt-4 border-t border-white/10">
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach($form->files->take(3) as $file)
                                                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-white/5 rounded text-xs text-white/60">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                            </svg>
                                                            {{ $file->file_name }}
                                                        </span>
                                                    @endforeach
                                                    @if($form->files->count() > 3)
                                                        <span class="text-xs text-white/40">+{{ $form->files->count() - 3 }} more</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <!-- Actions -->
                                        <div class="flex justify-end gap-3 pt-4 mt-4 border-t border-white/10">
                                            <a href="{{ route('admin.view.application', $form->id) }}" 
                                               class="px-4 py-2 bg-blue-500/20 text-blue-400 rounded-lg text-sm hover:bg-blue-500/30 transition-colors border border-blue-500/30">
                                                View Details
                                            </a>
                                            <button type="button"
                                                    onclick="confirmDelete('{{ route('admin.delete.application', $form->id) }}')"
                                                    class="px-4 py-2 bg-red-500/20 text-red-400 rounded-lg text-sm hover:bg-red-500/30 transition-colors border border-red-500/30">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- No Results Message -->
                        <div id="noResults" class="text-center py-12 hidden">
                            <svg class="w-16 h-16 text-white/40 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-white/70 text-lg">No applications found</p>
                            <p class="text-white/50 text-sm mt-1">Try adjusting your search or filter</p>
                        </div>
                    @endif
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

// Search and Filter Functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const positionFilter = document.getElementById('positionFilter');
    const applications = document.querySelectorAll('.application-item');
    const noResults = document.getElementById('noResults');
    
    function filterApplications() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
        const selectedPosition = positionFilter ? positionFilter.value : 'all';
        let visibleCount = 0;
        
        applications.forEach(app => {
            const positionId = app.dataset.positionId;
            const name = app.dataset.name;
            
            const matchesPosition = selectedPosition === 'all' || positionId === selectedPosition;
            const matchesSearch = searchTerm === '' || name.includes(searchTerm);
            
            if (matchesPosition && matchesSearch) {
                app.style.display = '';
                visibleCount++;
            } else {
                app.style.display = 'none';
            }
        });
        
        // Show/hide no results message
        if (noResults) {
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        }
    }
    
    // Add event listeners
    if (searchInput) {
        searchInput.addEventListener('keyup', filterApplications);
    }
    if (positionFilter) {
        positionFilter.addEventListener('change', filterApplications);
    }
});
</script>