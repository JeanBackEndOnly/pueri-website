<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Apply for {{ $positionId->position_name }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #2d1a1a 100%);
            position: relative;
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
        
        .form-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
        }
        
        input, select, textarea {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
        }
        
        input:focus, select:focus, textarea:focus {
            background: rgba(255,255,255,0.15);
            border-color: #ef4444;
            outline: none;
            ring: 2px solid #ef4444;
        }
        
        label {
            color: rgba(255,255,255,0.8);
        }
        
        .info-box {
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.3);
        }
    </style>
</head>
<body class="text-white">
    @include('layouts.alert')
    
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-black/50 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-red-500 rounded-full blur-lg opacity-50 animate-pulse"></div>
                        <img src="{{ asset('system_image/pueri-logo.png') }}" class="relative h-9 w-auto" alt="Logo">
                    </div>
                    <span class="font-bold text-lg text-white">ZPuericultureC Org.144, Inc.</span>
                </div>
                <a href="{{ route('index') }}" class="text-sm text-white/70 hover:text-white transition">Back to Home</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="relative z-10 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="form-card overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-4 border-b border-white/10">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center text-white/70 hover:text-white">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back
                    </a>
                </div>
                
                <form action="{{ route('apply.store', $positionId->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="p-6 md:p-8">
                        <!-- Position Info -->
                        <div class="mb-6 p-4 info-box rounded-lg">
                            <p class="text-red-400"><strong>Position:</strong> {{ $positionId->position_name }}</p>
                            <p class="text-red-400 mt-1"><strong>Available Slots:</strong> {{ $positionId->available_quantity }}</p>
                        </div>
                        
                        <!-- Personal Information -->
                        <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20">Personal Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium mb-1">First Name</label>
                                <input type="text" name="fname" value="{{ old('fname') }}" required
                                       class="w-full rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Middle Name</label>
                                <input type="text" name="mname" value="{{ old('mname') }}" required
                                       class="w-full rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Last Name</label>
                                <input type="text" name="lname" value="{{ old('lname') }}" required
                                       class="w-full rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Suffix</label>
                                <input type="text" name="suffix" value="{{ old('suffix') }}"
                                       class="w-full rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       class="w-full rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Contact Number</label>
                                <input type="text" name="contact" value="{{ old('contact') }}" required
                                       class="w-full rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Sex</label>
                                <select name="sex" required class="w-full rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500">
                                    <option value="" class="bg-gray-800">Select Sex</option>
                                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }} class="bg-gray-800">Male</option>
                                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }} class="bg-gray-800">Female</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium mb-1">Address</label>
                                <textarea name="address" rows="3" required
                                          class="w-full rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500">{{ old('address') }}</textarea>
                            </div>
                        </div>
                        
                        <!-- Work Experience -->
                        <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20 mt-6">Work Experience</h3>
                        
                        <div id="work-experience-container" class="space-y-4 mb-6">
                            <div class="work-experience-item border border-white/20 rounded-lg p-4 relative">
                                <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-400 remove-experience hidden">Remove</button>
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Position</label>
                                        <input type="text" 
                                            name="work_experience[0][position]" 
                                            value="{{ old('work_experience.0.position') }}" 
                                            class="w-full rounded-lg px-4 py-2">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Years of Experience</label>
                                        <input type="text" 
                                            name="work_experience[0][years]" 
                                            value="{{ old('work_experience.0.years') }}" 
                                            class="w-full rounded-lg px-4 py-2">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Company Name</label>
                                        <input type="text" 
                                            name="work_experience[0][company_name]" 
                                            value="{{ old('work_experience.0.company_name') }}" 
                                            class="w-full rounded-lg px-4 py-2">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Company Address</label>
                                        <input type="text" 
                                            name="work_experience[0][company_address]" 
                                            value="{{ old('work_experience.0.company_address') }}" 
                                            class="w-full rounded-lg px-4 py-2">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Company Contact</label>
                                        <input type="text" 
                                            name="work_experience[0][company_contact]" 
                                            value="{{ old('work_experience.0.company_contact') }}" 
                                            class="w-full rounded-lg px-4 py-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" id="add-experience" class="mb-6 text-red-400 hover:text-red-300 text-sm font-medium flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Another Experience
                        </button>
                        
                        <!-- Attachments -->
                        <h3 class="text-lg font-semibold text-white mb-4 pb-2 border-b border-white/20 mt-6">Attachments</h3>
                        
                        <div id="files-container" class="space-y-4 mb-6">
                            <div class="file-item border border-white/20 rounded-lg p-4 relative">
                                <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-400 remove-file hidden">Remove</button>
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium mb-1">File</label>
                                        <input type="file" name="files[]">
                                        <p class="text-xs text-white/50 mt-1">Accepted: PDF, DOC, DOCX (Max 5MB)</p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">File Name</label>
                                        <input type="text" name="file_names[]" placeholder="File Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" id="add-file" class="mb-6 text-red-400 hover:text-red-300 text-sm font-medium flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Another File
                        </button>
                        
                        <!-- Submit Buttons -->
                        <div class="flex flex-wrap justify-end gap-3 pt-6 border-t border-white/20 mt-6">
                            <a href="{{ url()->previous() }}" class="px-4 py-2 bg-white/10 text-white/80 rounded-lg hover:bg-white/20 transition">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Submit Application</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Work Experience Dynamic Fields
        let experienceIndex = 1;
        document.getElementById('add-experience').addEventListener('click', function() {
            const container = document.getElementById('work-experience-container');
            const newItem = document.createElement('div');
            newItem.className = 'work-experience-item border border-white/20 rounded-lg p-4 relative';
            newItem.innerHTML = `
                <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-400 remove-experience">Remove</button>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Position</label>
                        <input type="text" name="work_experience[${experienceIndex}][position]" class="w-full rounded-lg px-4 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Years of Experience</label>
                        <input type="text" name="work_experience[${experienceIndex}][years]" class="w-full rounded-lg px-4 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Company Name</label>
                        <input type="text" name="work_experience[${experienceIndex}][company_name]" class="w-full rounded-lg px-4 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Company Address</label>
                        <input type="text" name="work_experience[${experienceIndex}][company_address]" class="w-full rounded-lg px-4 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Company Contact</label>
                        <input type="text" name="work_experience[${experienceIndex}][company_contact]" class="w-full rounded-lg px-4 py-2">
                    </div>
                </div>
            `;
            container.appendChild(newItem);
            experienceIndex++;
            
            newItem.querySelector('.remove-experience').addEventListener('click', function() {
                newItem.remove();
            });
        });
        
        // Files Dynamic Fields
        let fileIndex = 1;
        document.getElementById('add-file').addEventListener('click', function() {
            const container = document.getElementById('files-container');
            const newItem = document.createElement('div');
            newItem.className = 'file-item border border-white/20 rounded-lg p-4 relative';
            newItem.innerHTML = `
                <div>
                    <input type="file" name="files[]" class="...">
                    <input type="text" name="file_names[]" placeholder="File Name" class="...">
                </div>
            `;
            container.appendChild(newItem);
            fileIndex++;
            
            newItem.querySelector('.remove-file').addEventListener('click', function() {
                newItem.remove();
            });
        });
    </script>
</body>
</html>