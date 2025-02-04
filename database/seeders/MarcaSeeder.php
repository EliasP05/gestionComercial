<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Marca::create([
            'marca_nombre'=>'Ades']);

        Marca::create([
            'marca_nombre'=>'Aguila']);

        Marca::create([
            'marca_nombre'=>'Aquarius']);

        Marca::create(
            ['marca_nombre'=>'Baggio']);

        Marca::create([
            'marca_nombre'=>'Bagley']);

        Marca::create([
            'marca_nombre'=>'Beldent']);

        Marca::create([
            'marca_nombre'=>'CasanCrem']);
        
        Marca::create([
            'marca_nombre'=>'Coca-Cola']);

        Marca::create([
            'marca_nombre'=>'Citric']);
        
        Marca::create([
            'marca_nombre'=>'Frigor']);
    }
}
