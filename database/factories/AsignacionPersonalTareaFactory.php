<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AsignacionPersonalTarea;
use Faker\Generator as Faker;

$factory->define(AsignacionPersonalTarea::class, function (Faker $faker) {

    return [
        'Responsabilidad' => $faker->word,
        'Personal_id' => $faker->randomDigitNotNull,
        'Tarea_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
