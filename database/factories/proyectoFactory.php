<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Proyecto;
use Faker\Generator as Faker;

$factory->define(Proyecto::class, function (Faker $faker) {

    return [
        'Nombre_proyecto' => $faker->word,
        'Tipo_proyecto' => $faker->word,
        'Nro_plantas' => $faker->randomDigitNotNull,
        'Fecha_inicio_Proy' => $faker->word,
        'Fecha_fin_Proy' => $faker->word,
        'Director_id' => $faker->randomDigitNotNull,
        'Comitente_id' => $faker->randomDigitNotNull,
        'Descripcion' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
