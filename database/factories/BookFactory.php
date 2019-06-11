<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        "book_name" => $faker->unique()->name,
        "author_id" => $faker->randomFloat(0,1,100),
        "nxb_id" => $faker->randomFloat(0,1,100),
        "qty"   => $faker->randomFloat(0,0,1000)
    ];
});
