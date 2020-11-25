<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Predecesora;
use Faker\Generator as Faker;

$factory->define(Predecesora::class, function (Faker $faker) {

    return [
        'Tarea_id' => $faker->randomDigitNotNull,
        'Predecesora_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
