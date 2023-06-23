<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class DatabaseTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function testUserIsSavedInDatabase()
    {
        // Create the user record
        $user = User::factory()->create([
            'name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'town' => 'Podgorica',
            'country' => 'Montenegro',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byM',
        ]);

        // Retrieve the record from the database
        $savedRecord = User::find($user->id);

        // Assert that the saved record matches the original data
        $this->assertEquals('John', $savedRecord->name);
        $this->assertEquals('Doe', $savedRecord->last_name);
        $this->assertEquals('johndoe@gmail.com', $savedRecord->email);
        $this->assertEquals('Podgorica', $savedRecord->town);
        $this->assertEquals('Montenegro', $savedRecord->country);
        $this->assertEquals('$2y$10$92IXUNpkjO0rOQ5byM', $savedRecord->password);
    }
}
