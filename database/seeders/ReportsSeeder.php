<?php
use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportsSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){
    Report::create(['course_id' => 1,'student_id' => 1,'report_title' => 'Issue with Course Material','report_body' => 'I am having trouble accessing the course material. Please help.']);

        Report::create([
            'course_id' => 2,
            'student_id' => 2,
            'report_title' => 'Instructor Feedback',
            'report_body' => 'I would like some feedback on my assignments. Thank you.'
        ]);

        // Add more reports here
    }
}