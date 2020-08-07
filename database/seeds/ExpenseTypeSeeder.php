<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_types')->insert(['name' => 'RHAO', 'description' => 'R_H_A_O']);
        DB::table('expense_types')->insert(['name' => 'HAO', 'description' => 'H_A_O']);
    }
}
