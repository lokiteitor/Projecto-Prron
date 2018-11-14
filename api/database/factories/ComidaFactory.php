<?php

use Faker\Generator as Faker;

$factory->define(App\Comida::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->word,
        'descripcion' => $faker->text,
        'costo' => $faker->randomFloat(2,30,80)

    ];
});
