<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Question;

class FavouritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('favourites')->delete();

        $users= User::pluck('id')->all();

        $numberOfUsers=count($users);


        foreach (Question::all() as $question)
         {
        	
        for($i=0; $i < rand(1, $numberOfUsers); $i++)

        {
        	$user= $users[$i]; // user will inserted one by one untill loop finished

        	$question->favourites()->attach($user);
        }

        }


    }
}
