<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker=Faker::create();
        foreach(range(1,100) as $index){
        	User::create([
        		'user_fname'=> $faker->word(),
        		'user_lname'=> $faker->word(),
        		'user_name'=> $faker->word(),
        		'user_dob'=> $faker->date(),
        		'user_email'=> $faker->word(),
        		'user_password'=> $faker->word(60),
        		'user_created'=> Carbon::now()
        		]);
        }
    }
}
