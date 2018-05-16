<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 7; $i++) {
            App\Unit::create(['name' => "Unidad " . $i, 'position_id' => \App\Position::all()->random()->id, 'direction_id'=>\App\Direction::all()->random()->id]);
        }
    }
}
