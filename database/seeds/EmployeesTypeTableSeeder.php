<?php

use Illuminate\Database\Seeder;

class EmployeesTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'Libre Nombramiento'],
            ['name' => 'Eventual'],
            ['name' => 'Consultor'],
        ];
        foreach ($statuses as $status) {
            App\EmployeeType::create($status);
        }
    }
}
