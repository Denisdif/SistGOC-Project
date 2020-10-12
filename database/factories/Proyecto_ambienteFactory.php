<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Proyecto_ambiente;
use Faker\Generator as Faker;

$factory->define(Proyecto_ambiente::class, function (Faker $faker) {

    return [
        'Cantidad' => $faker->randomDigitNotNull,
        'Ambiente_id' => $faker->randomDigitNotNull,
        'Proyecto_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
