<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <button type = "submit" class="px-3 py-1 rounded bg-gray-800 text-white hover:bg-gray-700">
            <a href = "{{route('articles.create')}}"> 新增活動</a>
        </button>
    </div>
</x-app-layout>