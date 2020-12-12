<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Asistencia;
use Faker\Generator as Faker;

$factory->define(Asistencia::class, function (Faker $faker) {

    return [
        'User_id' => $faker->randomDigitNotNull,
        'Entrada' => $faker->word,
        'Salida' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
