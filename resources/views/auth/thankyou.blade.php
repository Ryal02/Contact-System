<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-2xl font-semibold text-white">Thank You for Registering!</h1>
        <p class="text-lg text-gray-300 mt-4">You have successfully registered. Click the button below to go to your dashboard.</p>
    </div>

    <div class="flex justify-center mt-6">
        <x-primary-button class="ms-3" onclick="window.location.href='{{ route('dashboard') }}'">
            {{ __('Go to Dashboard') }}
        </x-primary-button>
    </div>
</x-guest-layout>
