<?php

use Illuminate\Database\Seeder;

class DirectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=6 ; $i++) {
            App\Direction::create(['name' => "Direccion ".$i]);
        }
    }
}
