<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // Fetch contacts with search and pagination
        $query = Contact::query();
    
        if ($request->has('search') && $request->search !== '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }
        $contacts = $query->paginate(10);
        return view('contacts.list', compact('contacts'));
        return view('dashboard', compact('contacts')); // Pass the $contacts variable to the view

    }
    
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:contacts,email',
            
        ]);

        // Create a new contact
        Contact::create([
            'name' => $validated['name'],
            'company' => $validated['company'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
           
        ]);

        // Redirect back to the contact list with a success message
        return redirect()->route('contacts.list')->with('success', 'Contact added successfully!');
    }
    
    public function create()
    {
        return view('contacts.create');
    }

    public function edit($id)
    {
        // Find the contact by ID
        $contact = Contact::findOrFail($id);

        // Return the edit view with the contact data
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        // Find the contact by ID
        $contact = Contact::findOrFail($id);

        // Update the contact data
        $contact->update($validated);

        // Redirect back to the contact list with a success message
        return redirect()->route('contacts.list')->with('success', 'Contact updated successfully!');
    }

    public function destroy($id)
    {
        // Find the contact by ID
        $contact = Contact::findOrFail($id);

        // Delete the contact
        $contact->delete();

        // Redirect back to the contact list with a success message
        return redirect()->route('contacts.list')->with('success', 'Contact deleted successfully!');
    }
}