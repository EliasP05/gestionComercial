<?php

namespace Database\Seeders;

use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdSeeder extends Seeder
{
   
    public function run(): void
    {
        $this->call(MarcaSeeder::class);

        $cocaCola= Marca::where('marca_nombre','Coca-Cola')->pluck('marca_id')->first();
        $baggio= Marca::where('marca_nombre','Baggio')->pluck('marca_id')->first();
        $frigor= Marca::where('marca_nombre','Frigor')->pluck('marca_id')->first();

        Producto::create([
            'marca_id'=>$cocaCola,
            'prod_cod'=>'1',
            'prod_nom'=>'Coca cola 1lt',
            'prod_descripcion'=>'de vidrio',
            'prod_costo'=>1500,
            'prod_precio'=>2000,
            'prod_stock'=>40,
            'prod_stock_min'=>10
        ]);
        Producto::create([
            'marca_id'=>$cocaCola,
            'prod_cod'=>'2',
            'prod_nom'=>'Coca cola Cero 1litro ',
            'prod_descripcion'=>'vidrio, sin azucar',
            'prod_costo'=>1600,
            'prod_precio'=>2100,
            'prod_stock'=>30,
            'prod_stock_min'=>5
        ]);
        Producto::create([
            'marca_id'=>$cocaCola,
            'prod_cod'=>'3',
            'prod_nom'=>'Coca cola 3L',
            'prod_descripcion'=>'original',
            'prod_costo'=>2800,
            'prod_precio'=>3400,
            'prod_stock'=>60,
            'prod_stock_min'=>30
        ]);
        Producto::create([
            'marca_id'=>$baggio,
            'prod_cod'=>'4',
            'prod_nom'=>'Jugo Naranja 200ml',
            'prod_descripcion'=>'200ml',
            'prod_costo'=>500,
            'prod_precio'=>800,
            'prod_stock'=>100,
            'prod_stock_min'=>20
        ]);
        Producto::create([
            'marca_id'=>$baggio,
            'prod_cod'=>'5',
            'prod_nom'=>'Jugo Durazno 200ml',
            'prod_descripcion'=>'200ml',
            'prod_costo'=>500,
            'prod_precio'=>800,
            'prod_stock'=>100,
            'prod_stock_min'=>20
        ]);Producto::create([
            'marca_id'=>$baggio,
            'prod_cod'=>'6',
            'prod_nom'=>'Jugo Multifruta 200ml',
            'prod_descripcion'=>'200ml',
            'prod_costo'=>500,
            'prod_precio'=>800,
            'prod_stock'=>100,
            'prod_stock_min'=>20
        ]);
        Producto::create([
            'marca_id'=>$baggio,
            'prod_cod'=>'7',
            'prod_nom'=>'Jugo Multifruta 1L',
            'prod_descripcion'=>'1 litro',
            'prod_costo'=>1000,
            'prod_precio'=>1500,
            'prod_stock'=>50,
            'prod_stock_min'=>30
        ]);
        Producto::create([
            'marca_id'=>$frigor,
            'prod_cod'=>'8',
            'prod_nom'=>'Palito Bombom',
            'prod_descripcion'=>'crema Americana',
            'prod_costo'=>560,
            'prod_precio'=>1200,
            'prod_stock'=>60,
            'prod_stock_min'=>10
        ]);
        Producto::create([
            'marca_id'=>$frigor,
            'prod_cod'=>'9',
            'prod_nom'=>'Torpedo Frutilla',
            'prod_descripcion'=>'sabor frutilla',
            'prod_costo'=>780,
            'prod_precio'=>1400,
            'prod_stock'=>30,
            'prod_stock_min'=>10
        ]);
        Producto::create([
            'marca_id'=>$frigor,
            'prod_cod'=>'10',
            'prod_nom'=>'EPA Black',
            'prod_descripcion'=>'palito bombom',
            'prod_costo'=>1200,
            'prod_precio'=>2000,
            'prod_stock'=>20,
            'prod_stock_min'=>5
        ]);

    }
}
