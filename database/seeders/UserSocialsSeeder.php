<?php
use Illuminate\Database\Seeder;
use App\Models\UserSocial;
use App\Models\User;
use App\Models\Social;

class UserSocialsSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){$users = User::all();$socials = Social::all();

        foreach ($users as $user) {
            $socialIds = $socials->random(2)->pluck('id');

            foreach ($socialIds as $socialId) {
                UserSocial::create([
                    'user_id' => $user->id,
                    'social_id' => $socialId
                ]);
            }
        }
    }
}