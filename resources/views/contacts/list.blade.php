<x-app-layout>
    <div class="p-10 px-40">
        <!-- Page Title and Add Button -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-white">Contact List</h2>
            <a href="/contacts/add" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Add Contact
            </a>
        </div>

        <!-- Search Bar --> 
        <div class="mb-4 flex">
            <input
                type="text"
                id="searchInput"
                placeholder="Search contacts..."
                class="w-2/6 border border-gray-300 rounded px-4 py-2"
            />
            <button 
                id="searchButton"
                class="bg-blue-500 text-white px-4 py-2 rounded ml-2 hover:bg-blue-600">
                Search
            </button>
        </div>
        @if(request('search'))
            <p class="text-gray-600 mb-4">Showing results for: "{{ request('search') }}"</p>
        @endif
        <!-- Table -->
        <div class="overflow-x-auto">
            @if(session('success'))
                <div id="successAlert" class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>

                <script>
                    // Wait for the DOM to fully load
                    document.addEventListener("DOMContentLoaded", function() {
                        // Get the alert element by its ID
                        const alert = document.getElementById("successAlert");
                        
                        // Set a timeout to hide the alert after 3 seconds (3000 milliseconds)
                        setTimeout(function() {
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 3000);
                    });
                </script>
            @endif
            <table class="min-w-full bg-white border border-gray-200 rounded shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left border-b">Name</th>
                        <th class="px-4 py-2 text-left border-b">Company</th>
                        <th class="px-4 py-2 text-left border-b">Phone Number</th>
                        <th class="px-4 py-2 text-left border-b">Email</th>
                        <th class="px-4 py-2 text-center border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $contact->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $contact->company }}</td>
                            <td class="px-4 py-2 border-b">{{ $contact->phone }}</td>
                            <td class="px-4 py-2 border-b">{{ $contact->email }}</td>
                            <td class="px-4 py-2 border-b text-center">
                                <a href="/contacts/edit/{{ $contact->id }}" 
                                   class="text-blue-500 hover:underline">Edit</a> |
                                <button 
                                    data-contact-id="{{ $contact->id }}" 
                                    class="text-red-500 hover:underline ml-4 delete-button">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No contacts found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
        <!-- {{ $contacts->links() }} -->
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h3 class="text-xl font-semibold mb-4">Are you sure you want to delete this contact?</h3>
            <p class="mb-4">This action cannot be undone.</p>
            <div class="flex justify-end space-x-4">
                <!-- Cancel Button -->
                <button onclick="closeModal()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                    Cancel
                </button>

                <!-- Confirm Delete Button -->
                <form id="deleteForm" method="POST" action="" class="inline">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- JS for Modal -->
    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const contactId = button.getAttribute('data-contact-id');
                deleteForm.action = '/contacts/' + contactId;
                deleteModal.classList.remove('hidden');
            });
        });

        function closeModal() {
            deleteModal.classList.add('hidden');
        }
    </script>
   <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchButton = document.getElementById('searchButton');
            const searchInput = document.getElementById('searchInput');

            searchButton.addEventListener('click', function() {
                searchContacts(searchInput.value);
            });

            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchContacts(searchInput.value);
                }
            });

            function searchContacts(searchTerm) {
                if (searchTerm) {
                    window.location.href = `/contacts?search=${searchTerm}`;
                } else {
                    window.location.href = '/contacts';
                }
            }
        });
    </script>
</x-app-layout>
