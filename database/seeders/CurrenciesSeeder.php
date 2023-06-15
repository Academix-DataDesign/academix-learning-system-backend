<?php
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrenciesSeeder extends Seeder
{
    /** 
     
Run the database seeds.*
@return void*/
public function run(){
    Currency::create(['currency_name' => 'USD']);
    Currency::create(['currency_name' => 'EUR']);
    Currency::create(['currency_name' => 'GBP']);// Add more currencies here}
}
}