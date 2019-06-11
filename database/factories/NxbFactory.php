<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Nxb::class, function (Faker $faker) {
    return [
        "nxb_name"=>$faker->unique()->domainName
    ];
});
