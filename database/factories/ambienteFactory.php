<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ambiente;
use Faker\Generator as Faker;

$factory->define(ambiente::class, function (Faker $faker) {

    return [
        'Nombre_ambiente' => $faker->word,
        'Imagen' => $faker->word,
        'Descripcion' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
