<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\proyecto;
use Faker\Generator as Faker;

$factory->define(proyecto::class, function (Faker $faker) {

    return [
        'Nombre_proyecto' => $faker->word,
        'Tipo' => $faker->word,
        'Fecha_inicio' => $faker->word,
        'Fecha_fin' => $faker->word,
        'Descripcion' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
