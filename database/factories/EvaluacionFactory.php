<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Evaluacion;
use Faker\Generator as Faker;

$factory->define(Evaluacion::class, function (Faker $faker) {

    return [
        'Evaluador_id' => $faker->randomDigitNotNull,
        'Personal_id' => $faker->randomDigitNotNull,
        'Fecha_inicio' => $faker->word,
        'Fecha_fin' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
