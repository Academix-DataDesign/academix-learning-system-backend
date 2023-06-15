<?php
use Illuminate\Database\Seeder;
use App\Models\Social;

class SocialsSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){
    Social::create(['social_icon' => 'facebook-icon', 'social_name' => 'Facebook']);
    Social::create(['social_icon' => 'twitter-icon', 'social_name' => 'Twitter']);
    Social::create(['social_icon' => 'instagram-icon', 'social_name' => 'Instagram']);// Add more socials here}
}