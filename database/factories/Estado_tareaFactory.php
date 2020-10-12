<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Estado_tarea;
use Faker\Generator as Faker;

$factory->define(Estado_tarea::class, function (Faker $faker) {

    return [
        'Nombre_estado_tarea' => $faker->word,
        'Descripcion' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
