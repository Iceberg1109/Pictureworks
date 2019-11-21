<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 20; $i++) { 
            $comment = array(Str::random(10));
	    	DB::table('users')->insert([
	            'id' => Str::random(10),
	            'password' => Str::random(10),
	            'comment' => json_encode($comment),
	        ]);
    	}
    }
}
