<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tipo_proyecto;
use Faker\Generator as Faker;

$factory->define(Tipo_proyecto::class, function (Faker $faker) {

    return [
        'Nombre' => $faker->word,
        'Descripcion_tipo' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
