<?php
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsSeeder extends Seeder
{
   
public function run(){
    Topic::create(['topic_name' => 'HTML']);
    Topic::create(['topic_name' => 'CSS']);
    Topic::create(['topic_name' => 'JavaScript']);// Add more topics here}
}
}