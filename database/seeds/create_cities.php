<?php

use Illuminate\Database\Seeder;

class create_cities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'Beni', 'first_shortened' => 'Be', 'second_shortened' => ' '],
            ['name' => 'Cochabamba', 'first_shortened' => 'Cb', 'second_shortened' => 'Cbba'],
            ['name' => 'La Paz', 'first_shortened' => 'LP', 'second_shortened' => ' '],
            ['name' => 'Oruro', 'first_shortened' => 'Or', 'second_shortened' => ' '],
            ['name' => 'Pando', 'first_shortened' => 'Pa', 'second_shortened' => ' '],
            ['name' => 'Potosi', 'first_shortened' => 'Po', 'second_shortened' => ' '],
            ['name' => 'Santa Cruz', 'first_shortened' => 'SC', 'second_shortened' => 'Sta Cruz '],
            ['name' => 'Sucre', 'first_shortened' => 'Su', 'second_shortened' => ' '],
            ['name' => 'Tarija', 'first_shortened' => 'Ta', 'second_shortened' => ' '],
            ]);
    }
}
