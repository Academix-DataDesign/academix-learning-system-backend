<?php
use Illuminate\Database\Seeder;
use App\Models\Newsletter;
use App\Models\User;

class NewsletterSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){$subscribers = User::whereIn('type_id', [1, 3])->get();

        foreach ($subscribers as $subscriber) {
            Newsletter::create([
                'student_id' => $subscriber->id
            ]);
        }
    }
}