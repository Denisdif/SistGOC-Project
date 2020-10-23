<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comentario;
use Faker\Generator as Faker;

$factory->define(Comentario::class, function (Faker $faker) {

    return [
        'Contenido' => $faker->text,
        'Tarea_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
