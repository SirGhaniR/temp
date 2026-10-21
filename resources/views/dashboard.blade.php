<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-sm">You're signed in as <strong>{{ auth()->user()->email }}</strong>.</p>
                    <p class="mt-4 text-sm text-gray-600">
                        The content admin lives at <code class="rounded bg-gray-100 px-1">/admin</code>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
