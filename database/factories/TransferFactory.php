<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transfer;
use Faker\Generator as Faker;

$factory->define(Transfer::class, function (Faker $faker) {

    return [
        'driver_id' => $faker->word,
        'cart_note' => $faker->randomDigitNotNull,
        'day' => $faker->word,
        'date' => $faker->word,
        'time' => $faker->word,
        'category_id' => $faker->word,
        'to' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
