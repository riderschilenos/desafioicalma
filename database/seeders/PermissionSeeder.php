<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'=>'Crear series',
        ]);

        Permission::create([
            'name'=>'Leer series',
        ]);

        Permission::create([
            'name'=>'Actualizar series',
        ]);

        Permission::create([
            'name'=>'Eliminar series',
        ]);

        Permission::create([
            'name'=>'Ver dashboard',
        ]);

        Permission::create([
            'name'=>'Crear Rol',
        ]);

        Permission::create([
            'name'=>'Listar Rol',
        ]);

        Permission::create([
            'name'=>'Editar Rol',
        ]);

        Permission::create([
            'name'=>'Eliminar Rol',
        ]);

        Permission::create([
            'name'=>'Leer usuarios',
        ]);

        Permission::create([
            'name'=>'Editar usuarios',
        ]);
    }
}
