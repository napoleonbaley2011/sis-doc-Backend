<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSedeer extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_transcriptor = Role::create(['name' => 'transcriptor']);

        $permission_create_role = Permission:: create(['name' => 'create roles']);
        $permission_read_role = Permission:: create(['name' => 'read roles']);
        $permission_update_role = Permission:: create(['name' => 'update roles']);
        $permission_delete_role = Permission:: create(['name' => 'delete roles']);

        $permission_create_documento = Permission:: create(['name' => 'create documentos']);
        $permission_read_documento = Permission:: create(['name' => 'read documentos']);
        $permission_update_documento = Permission:: create(['name' => 'update documentos']);
        $permission_delete_documento = Permission:: create(['name' => 'delete documentos']);

        $permission_create_categoria = Permission:: create(['name' => 'create categorias']);
        $permission_read_categoria = Permission:: create(['name' => 'read categorias']);
        $permission_update_categoria = Permission:: create(['name' => 'update categorias']);
        $permission_delete_categoria = Permission:: create(['name' => 'delete categorias']);

        $permissions_admin = [$permission_create_role,$permission_read_role,$permission_update_role,$permission_delete_role,$permission_create_documento,$permission_read_documento,$permission_update_documento,$permission_delete_documento,$permission_create_categoria,$permission_read_categoria,$permission_update_categoria,$permission_delete_categoria];

        $permissions_transcriptor = [$permission_create_documento,$permission_read_documento,$permission_update_documento,$permission_delete_documento];

        $role_admin->syncPermissions($permissions_admin);
        $role_transcriptor->syncPermissions($permissions_transcriptor);
    }
}
