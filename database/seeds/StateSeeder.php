<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(['name' => 'DRAFT']);
        DB::table('states')->insert(['name' => 'SENT']);
        DB::table('states')->insert(['name' => 'ACCEPTED']);
        DB::table('states')->insert(['name' => 'REJECTED']);
        DB::table('states')->insert(['name' => 'PERFECT']);
        DB::table('states')->insert(['name' => 'SEALED']);
        DB::table('states')->insert(['name' => 'UNPAID']);
        DB::table('states')->insert(['name' => 'PAID']);
        DB::table('states')->insert(['name' => 'SEMIPAID']);
    }
}
