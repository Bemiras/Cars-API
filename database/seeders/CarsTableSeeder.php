<?php

namespace Database\Seeders;

use App\Models\Cars;
use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cars::create([
            'name' => 'Toyota',
            'type' => 'big'
        ]);
        Cars::create([
            'name' => 'Bmw',
            'type' => 'big'
        ]);
        Cars::create([
            'name' => 'Audi',
            'type' => 'small'
        ]);
        Cars::create([
            'name' => 'Ford',
            'type' => 'big'
        ]);
    }
}
