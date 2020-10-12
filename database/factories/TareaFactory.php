<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tarea;
use Faker\Generator as Faker;

$factory->define(Tarea::class, function (Faker $faker) {

    return [
        'Nombre_tarea' => $faker->word,
        'Fecha_inicio' => $faker->word,
        'Fecha_fin' => $faker->word,
        'Valor' => $faker->word,
        'Correcciones' => $faker->word,
        'Descripcion_tarea' => $faker->text,
        'Proyecto_id' => $faker->randomDigitNotNull,
        'Tipo_tarea_id' => $faker->randomDigitNotNull,
        'Estado_tarea_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
