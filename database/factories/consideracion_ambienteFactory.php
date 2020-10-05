<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\consideracion_ambiente;
use Faker\Generator as Faker;

$factory->define(consideracion_ambiente::class, function (Faker $faker) {

    return [
        'Complejidad' => $faker->word,
        'Ambiente_id' => $faker->randomDigitNotNull,
        'Consideracion_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
