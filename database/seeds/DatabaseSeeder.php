<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        $user = App\Models\User::create([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'password' => bcrypt('secret'),
	        ]);
        	$shop = App\Models\Shop::create([
	    		'name' => $faker->sentence(2), 
	    		'image' => $faker->imageUrl(200, 200), 
	    		'distance' => $faker->numberBetween(1, 50), 
	    		'likes' => rand(0, 50), 
	    		'dislikes' => rand(0, 20) 
	    	]);
	    	if(rand(0, 1)) {
        		$user->shops()->attach($shop->id);
	    	}
		}
    }
}
