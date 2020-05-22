<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
 
class permissionstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name'=>'Navegar Usuario',
            'slug'=>'users.index',
            'description'=>'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de usuario',
            'slug'=>'users.show',
            'description'=>'Ver en detalle cada usuarios del sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de Usuario',
            'slug'=>'users.edit',
            'description'=>'Editar cualquier dato de un usuarios del sistema',
        ]);
         Permission::create([
            'name'=>'Eliminar Usuario',
            'slug'=>'users.destroy',
            'description'=>'Eliminar cualquier usuarios del sistema',
        ]);
        //Roles 

        Permission::create([
            'name'=>'Navegar roles',
            'slug'=>'roles.index',
            'description'=>'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de rol',
            'slug'=>'roles.show',
            'description'=>'Ver en detalle de cada rol del sistema',
        ]);
        Permission::create([
            'name'=>'Creacion de rol',
            'slug'=>'roles.create',
            'description'=>'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de roles',
            'slug'=>'roles.edit',
            'description'=>'Editar cualquier dato de un rol del sistema',
        ]);
         Permission::create([
            'name'=>'Eliminar rol',
            'slug'=>'roles.destroy',
            'description'=>'Eliminar cualquier rol del sistema',
        ]);

        //Products

        Permission::create([
            'name'=>'Navegar productos',
            'slug'=>'products.index',
            'description'=>'Lista y navega todos los productos del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de producto',
            'slug'=>'products.show',
            'description'=>'Ver en detalle de cada producto del sistema',
        ]);
        Permission::create([
            'name'=>'Creacion de producto',
            'slug'=>'products.create',
            'description'=>'Editar cualquier dato de un producto del sistema',
        ]);
        Permission::create([
            'name'=>'Edicion de producto',
            'slug'=>'products.edit',
            'description'=>'Editar cualquier dato de un producto del sistema',
        ]);
         Permission::create([
            'name'=>'Eliminar producto',
            'slug'=>'products.destroy',
            'description'=>'Eliminar cualquier producto del sistema',
        ]);
        
        //Comparar
        Permission::create([
            'name'=>'Comparar Archivo',
            'slug'=>'personajes.create',
            'description'=>'Compararador de Archivos',
        ]);

        //Logs
        Permission::create([
            'name'=>'Logs de Archivo',
            'slug'=>'logs.index',
            'description'=>'Movimientos y/o acciones realizadas (Logs)',
        ]);

    }
}