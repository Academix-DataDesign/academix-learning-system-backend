<?php
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){
    Status::create(['status_name' => 'Active']);
    Status::create(['status_name' => 'Inactive']);
    
}
}