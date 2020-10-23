<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entrega;
use Faker\Generator as Faker;

$factory->define(Entrega::class, function (Faker $faker) {

    return [
        'Archivo' => $faker->word,
        'Descripcion_entrega' => $faker->text,
        'Tarea_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
