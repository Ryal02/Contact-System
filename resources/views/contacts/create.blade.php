<x-app-layout>
    <div class="px-96 py-20 text-white">
        <!-- Page Title and Back Button -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Add New Contact</h2>
            <a href="/contacts/list" class="bg-gray-500 text-white px-200 py-2 rounded hover:bg-gray-600">
                Back to Contact List
            </a>
        </div>

        <!-- Add Contact Form -->
        <form action="/contacts/store" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="w-full border border-gray-300 rounded px-2 text-gray-600 py-2"
                    required
                />
            </div>
            <div class="mb-4">
                <label for="company" class="block text-sm font-semibold">Company</label>
                <input
                    type="text"
                    id="company"
                    name="company"
                    class="w-full border border-gray-300 rounded px-2 text-gray-600 py-2"
                    required
                />
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-semibold">Phone Number</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    class="w-full border border-gray-300 rounded px-2 text-gray-600 py-2"
                    required
                />
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="w-full border border-gray-300 rounded px-2 text-gray-600 py-2"
                    required
                />
            </div>
            
            <div class="mb-4">
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600"
                >
                    Save Contact
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
