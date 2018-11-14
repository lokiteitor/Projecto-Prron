<?php

use Faker\Generator as Faker;

$factory->define(App\Empleado::class, function (Faker $faker) {
    return [
        //
        'nomina' => $faker->unique()->randomNumber(6),
        'nombre' => $faker->firstName,
        'ap_paterno' => $faker->lastName,
        'ap_materno' => $faker->lastName,
        'direccion' => $faker->streetName,
        'tipo_empleado' => $faker->randomElement(array(1,2)),
        'sueldo' => $faker->randomFloat(2,1200,5000)        
    ];
});
