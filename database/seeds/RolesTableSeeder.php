<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
            ],
            /*
            [
                'name' => 'Validador',
            ],
            [
                'name' => 'Calificador',
            ],
            [
                'name' => 'Postulante',
            ],
            */
            [
                'name' => 'Comisión conocimiento',
            ],
            [
                'name' => 'Comisión méritos',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
