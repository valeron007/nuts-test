<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Proposal;
use Faker\Generator as Faker;

$factory->define(Proposal::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'subject' => $faker->text,
        'message' => $faker->text,
        'email' => $faker->email,
        'date_create_proposal' => $faker->date('Y-m-d'),
        'client_id' => $faker->numberBetween(),
        'url_file' => $faker->url
    ];
});

