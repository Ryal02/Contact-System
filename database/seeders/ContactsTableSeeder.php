<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact; // Import your model

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        // Creating sample contacts
        Contact::create([
            'name' => 'John Doe',
            'company' => 'Example Corp',
            'phone' => '1234567890',
            'email' => 'john@example.com',
        ]);

        Contact::create([
            'name' => 'Jane Smith',
            'company' => 'Smith Enterprises',
            'phone' => '0987654321',
            'email' => 'jane@example.com',
        ]);

        // Add more contacts if needed
    }
}
