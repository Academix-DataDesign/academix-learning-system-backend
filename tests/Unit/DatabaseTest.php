<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test if a record is saved in the database.
     */
    public function testUserIsSavedInDatabase()
    {
        // Create the user record
        $user = User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'town' => 'Podgorica',
            'country' => 'Montenegro',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byM',
        ]);

        // Retrieve the record from the database
        $savedRecord = User::find($user->id);

        // Assert that the saved record matches the original data
        $this->assertEquals('John', $savedRecord->first_name);
        $this->assertEquals('Doe', $savedRecord->last_name);
        $this->assertEquals('johndoe@gmail.com', $savedRecord->email);
        $this->assertEquals('Podgorica', $savedRecord->town);
        $this->assertEquals('Montenegro', $savedRecord->country);
        $this->assertEquals('$2y$10$92IXUNpkjO0rOQ5byM', $savedRecord->password);
    }
}
