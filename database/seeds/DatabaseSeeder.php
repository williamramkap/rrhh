<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MonthsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(EmployeesTypeTableSeeder::class);
        $this->call(ManagementEntityTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ChargesTableSeeder::class);
        $this->call(PositionGroupTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(ContractTableSeeder::class);
        $this->call(DiscountTypesAndDiscountTableSeeder::class);
    }
}
