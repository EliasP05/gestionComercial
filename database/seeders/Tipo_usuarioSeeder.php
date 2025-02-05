<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Tipo_usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tipo::create(['tip_nombre' =>'Administrador']);
        Tipo::create(['tip_nombre' =>'Cajero']);
        
        $admin=Role::create(['name'=>'Administrador']);
        $cajero=Role::create(['name'=>'Cajero']);

        Permission::create(['name'=>'marcas.index'])->syncRoles([$admin,$cajero]);
        Permission::create(['name'=>'marcas.create'])->assignRole($admin);
        Permission::create(['name'=>'marcas.edit'])->assignRole($admin);
        Permission::create(['name'=>'marcas.destroy'])->assignRole($admin);

        Permission::create(['name'=>'usuarios.index'])->assignRole($admin);
        Permission::create(['name'=>'usuarios.create'])->assignRole($admin);
        Permission::create(['name'=>'usuarios.edit'])->assignRole($admin);
        Permission::create(['name'=>'usuarios.destroy'])->assignRole($admin);

        Permission::create(['name'=>'productos.index'])->syncRoles([$admin,$cajero]);
        Permission::create(['name'=>'productos.create'])->assignRole($admin);
        Permission::create(['name'=>'productos.edit'])->assignRole($admin);
        Permission::create(['name'=>'productos.destroy'])->assignRole($admin);

        Permission::create(['name'=>'ventas.index'])->syncRoles([$admin,$cajero]);
        Permission::create(['name'=>'ventas.pdf'])->syncRoles([$admin,$cajero]);
    }
}
