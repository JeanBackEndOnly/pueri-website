<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Deletion confirmation') }}
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="max-w-9xl flex justify-center items-center max:px-4 sm:px-4 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3 px-7">
                <strong class="text-2xl">Are you sure you want to delete this information?</strong>
                <div class="max-w flex justify-center">
                    <a href="{{ route('admin.section_unit') }}" class="mt-2 bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded-lg text-sm font-medium">
                        Cancel
                    </a>
                    <form action="{{ route('admin.delete.department', $dept->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="ms-2 mt-2 bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm font-medium">
                            Yes, Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>