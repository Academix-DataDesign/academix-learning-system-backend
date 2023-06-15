<?php
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){
    Category::create(['category_name' => 'Web Development']);
    Category::create(['category_name' => 'Design']);
    Category::create(['category_name' => 'Marketing']);// Add more categories here}
}
}