<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert(['method' => 'Flooz']);
        DB::table('payment_methods')->insert(['method' => 'Tmoney']);
        DB::table('payment_methods')->insert(['method' => 'Virement Bancaire']);
        DB::table('payment_methods')->insert(['method' => 'Cheque']);
        DB::table('payment_methods')->insert(['method' => 'Espece']);
    }
}
