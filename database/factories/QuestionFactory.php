<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
            'title'=> rtrim($faker->sentence(rand(5,10)),"."),
            'body'=>$faker->paragraphs(rand(2,3),true),
            'views'=>rand(0,10),
            'answers'=>rand(0,10),
            'votes'=>rand(-5,10),
             



    ];
});
