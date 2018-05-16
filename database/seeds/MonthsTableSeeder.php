<?php

use Illuminate\Database\Seeder;

class MonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ["name" => "Enero"],
            ["name" => "Febrero"],
            ["name" => "Marzo"],
            ["name" => "Abril"],
            ["name" => "Mayo"],
            ["name" => "Junio"],
            ["name" => "Julio"],
            ["name" => "Agosto"],
            ["name" => "Septiembre"],
            ["name" => "Octubre"],
            ["name" => "Noviembre"],
            ["name" => "Diciembre"],
        ];
        foreach ($statuses as $status) {
            App\Month::create($status);
        }
    }
}
