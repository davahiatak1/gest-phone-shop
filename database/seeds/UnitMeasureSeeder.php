<?php

use Illuminate\Database\Seeder;

class UnitMeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_measures')->insert(['unit' => 'Carton']);
        DB::table('unit_measures')->insert(['unit' => 'Casier']);
        DB::table('unit_measures')->insert(['unit' => 'Bouteille']);
        DB::table('unit_measures')->insert(['unit' => 'Rouleau']);
    }
}
