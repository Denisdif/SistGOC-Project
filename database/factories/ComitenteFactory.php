<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comitente;
use Faker\Generator as Faker;

$factory->define(Comitente::class, function (Faker $faker) {

    return [
        'NombreComitente' => $faker->word,
        'Apellido' => $faker->word,
        'Email' => $faker->word,
        'Telefono' => $faker->randomDigitNotNull,
        'DNI' => $faker->randomDigitNotNull,
        'Sexo' => $faker->word,
        'Direccion_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
