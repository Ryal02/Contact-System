<x-app-layout>
    <div class="px-96 py-20 text-white">
        <!-- Page Title -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Edit Contact</h2>
            <a href="/contacts/list" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Back to Contacts
            </a>
        </div>

        <!-- Edit Contact Form -->
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT method for update -->
            
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-white ">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $contact->name) }}" 
                    class="w-full border border-gray-300 rounded px-2 py-2 text-gray-600"
                    required
                />
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <!-- Company -->
            <div class="mb-4">
                <label for="company" class="block text-sm font-medium text-white0">Company</label>
                <input
                    type="text"
                    name="company"
                    id="company"
                    value="{{ old('company', $contact->company) }}" 
                    class="w-full border border-gray-300 rounded px-2 py-2 text-gray-600"
                    required
                />
                @error('gender')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-white0">Phone Number</label>
                <input
                    type="text"
                    name="phone"
                    id="phone"
                    value="{{ old('phone', $contact->phone) }}" 
                    class="w-full border border-gray-300 rounded px-2 py-2 text-gray-600"
                    required
                />
                @error('phone')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-white0">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $contact->email) }}" 
                    class="w-full border border-gray-300 rounded px-2 py-2 text-gray-600"
                    required
                />
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Update Contact
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
