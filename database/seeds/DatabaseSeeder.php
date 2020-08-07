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
        // $this->call(UserSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(MovementTypeSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(UnitMeasureSeeder::class);
        $this->call(ExpenseTypeSeeder::class);
    }
}
