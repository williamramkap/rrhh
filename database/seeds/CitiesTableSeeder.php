<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'BENI', 'first_shortened' => 'BN', 'second_shortened' => 'BEN'],
            ['name' => 'CHUQUISACA', 'first_shortened' => 'CH', 'second_shortened' => 'SUC'],
            ['name' => 'COCHABAMBA', 'first_shortened' => 'CB', 'second_shortened' => 'CBB'],
            ['name' => 'LA PAZ', 'first_shortened' => 'LP', 'second_shortened' => 'LPZ'],
            ['name' => 'ORURO', 'first_shortened' => 'OR', 'second_shortened' => 'ORU'],
            ['name' => 'PANDO', 'first_shortened' => 'PD', 'second_shortened' => 'PDO'],
            ['name' => 'POTOSÍ', 'first_shortened' => 'PT', 'second_shortened' => 'PTS'],
            ['name' => 'SANTA CRUZ', 'first_shortened' => 'SC', 'second_shortened' => 'SCZ'],
            ['name' => 'TARIJA', 'first_shortened' => 'TJ', 'second_shortened' => 'TJA']
        ];
        foreach ($statuses as $status) {
            App\City::create($status);
        }
    }
}
