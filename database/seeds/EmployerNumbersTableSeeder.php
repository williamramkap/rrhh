<?php

use Illuminate\Database\Seeder;

class EmployerNumbersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numbers = [
            ['number' => '01-720-0025'],
            ['number' => '03-720-00010'],
            ['number' => '09-911-00024'],
            ['number' => '07-911-00041'],
            ['number' => '04-720-00004'],
        ];
        foreach ($numbers as $number) {
            App\EmployerNumber::create($number);
        }
    }
}
