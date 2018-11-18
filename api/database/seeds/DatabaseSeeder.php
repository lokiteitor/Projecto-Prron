<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        

        $departamentos = factory(App\Departamento::class,2)->create()->each(function ($departamento)
        {
            $empleados = factory(App\Empleado::class,300)->create([
                'id_departamento' => $departamento->id
            ]);
            $comidas = factory(App\Comida::class,20)->create();
            foreach ($empleados as $empleado) {
                
                for ($i=0; $i < 150; $i++) { 
                    $empleado->registros()->save(factory(App\Registro_comida::class)->create([
                        'id_comida' => $comidas->random(),
                        'nomina' => $empleado->nomina
                    ]));
                }
            }
        });
    }
}
