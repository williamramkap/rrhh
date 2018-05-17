<?php

use Illuminate\Database\Seeder;

class DiscountTypesAndDiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => "Descuentos por Ley"],
            ['name' => "Descuentos de la Institución"],
        ];
        foreach ($statuses as $status) {
            App\DiscountType::create($status);
        }

        $statuses = [
            ["name" => "Renta vejez 10 %", "percentage" => '10', 'discount_type_id' => 1],
            ["name" => "Riesgo común 1,71 %", "percentage" => '1.71', 'discount_type_id' => 1],
            ["name" => "Comisión 0 ,5 %", "percentage" => '5', 'discount_type_id' => 1],
            ["name" => "Aporte solidario del asegurado 0 ,5 %", "percentage" => '5', 'discount_type_id' => 1],
            ["name" => "Aporte Nacional solidario 1 %", "percentage" => '1', 'discount_type_id' => 1],
            ["name" => "Desc. Atrasos, Abandonos, Faltas y Licencia S/G Haberes", 'discount_type_id' => 2],
        ];
        foreach ($statuses as $status) {
            App\Discount::create($status);
        }
    }
}