<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Direccion;
use Faker\Generator as Faker;

$factory->define(Direccion::class, function (Faker $faker) {

    return [
        'Calle' => $faker->word,
        'Altura' => $faker->randomDigitNotNull,
        'Pais_id' => $faker->randomDigitNotNull,
        'Provincia_id' => $faker->randomDigitNotNull,
        'Localidad_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
