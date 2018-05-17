<?php

use Illuminate\Database\Seeder;

class PositionGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => "DIRECCION GENERAL EJECUTIVA", 'shortened' => 'DGE'],
            ['name' => "HONORABLE DIRECTORIO", 'shortened' => ''],
            ['name' => "UNIDAD DE AUDITORIA INTERNA", 'shortened' => ''],
            ['name' => "UNIDAD DE AUDITORIA", 'shortened' => ''],

        ];
        foreach ($statuses as $status) {
            App\PositionGroup::create($status);
        }
    }
}
