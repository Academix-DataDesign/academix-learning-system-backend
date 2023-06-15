<?php
use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationsSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){Notification::create(['course_id' => 1,'notification_title' => 'Course Update','notification_body' => 'A new module has been added to the course.']);

        Notification::create([
            'course_id' => 2,
            'notification_title' => 'Upcoming Webinar',
            'notification_body' => 'There will be a webinar on the topic "Advanced JavaScript" next week.'
        ]);

        // Add more notifications here
    }
}