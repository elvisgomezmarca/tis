<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [ 'name' => 'list users' ],
            [ 'name' => 'create users' ],
            [ 'name' => 'edit users' ],
            [ 'name' => 'delete users' ],

            [ 'name' => 'list roles' ],
            [ 'name' => 'create roles' ],
            [ 'name' => 'edit roles' ],
            [ 'name' => 'delete roles' ],

            [ 'name' => 'list areas' ],
            [ 'name' => 'create areas' ],
            [ 'name' => 'edit areas' ],
            [ 'name' => 'delete areas' ],

            [ 'name' => 'list announcements' ],
            [ 'name' => 'create announcements' ],
            [ 'name' => 'edit announcements' ],
            [ 'name' => 'delete announcements' ],

            [ 'name' => 'list requirements' ],
            [ 'name' => 'create requirements' ],
            [ 'name' => 'edit requirements' ],
            [ 'name' => 'delete requirements' ],

            [ 'name' => 'list postulants' ],
            [ 'name' => 'create postulants' ],
            [ 'name' => 'edit postulants' ],
            [ 'name' => 'delete postulants' ],
        ];

        $admin = Role::find(1);
        $conocimiento = Role::find(2);
        $meritos = Role::find(3);
        //$postulante = Role::find(4);

        foreach ($permissions as $permission) {
            Permission::create($permission);
            $admin->givePermissionTo($permission);
        }

        $conocimiento->givePermissionTo([
            'list postulants',
            'list announcements',
        ]);

        $meritos->givePermissionTo([
            //'list postulants',
            'list announcements',
        ]);

    }
}
