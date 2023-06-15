<?php
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguagesSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run()
{
    Language::create(['language_name' => 'English']);
    Language::create(['language_name' => 'Spanish']);
    Language::create(['language_name' => 'French']);}
}
