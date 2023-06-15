<?php

use Illuminate\Database\Seeder;
use App\Models\Release;
use App\Models\User;

class ReleasesSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){$instructor = User::where('type_id', 2)->first();
    Release::create(['instructor_id' => $instructor->id,'release_title' => 'New Course Announcement','date' => '2023-06-20','link' => 'https://example.com/new-course']);

        Release::create([
            'instructor_id' => $instructor->id,
            'release_title' => 'Upcoming Webinar',
            'date' => '2023-06-25',
            'link' => 'https://example.com/webinar'
        ]);
    }
}