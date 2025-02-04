<?php

namespace Database\Seeders;

use App\Models\Tipo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    
    public function run(): void
    {
        $this->call(Tipo_usuarioSeeder::class);
        // User::factory(10)->create();
        $adminId= Tipo::where('tip_nombre','Administrador')->pluck('tip_id')->first();
        User::factory()->create([
            'name' => 'Elias',
            'usu_apellido' => 'Peralta',
            'email' => 'eliasalberto0505@gmail.com',
            'password' => Hash::make('password'),
            'tip_id' => $adminId,
            'usu_dni' => 43438715
        ]);
    }
}
