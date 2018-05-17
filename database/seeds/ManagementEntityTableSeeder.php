<?php

use Illuminate\Database\Seeder;

class ManagementEntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'FUTURO'],
            ['name' => 'PREVISION']
        ];
        foreach ($statuses as $status) {
            App\ManagementEntity::create($status);
        }
    }
}
