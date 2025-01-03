<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voucher::create([
            'name' => 'Voucher Makanan',
            'points' => 50,
            'image' => 'assets/voucher.png',
            'description' => 'Voucher Makanan PizzaSkuy 20%'
        ]);

        Voucher::create([
            'name' => 'Voucher Makanan',
            'points' => 100,
            'image' => 'assets/voucher.png',
            'description' => 'Voucher Makanan PizzaSkuy 50%'
        ]);

        Voucher::create([
            'name' => 'Voucher Makanan',
            'points' => 30,
            'image' => 'assets/voucher.png',
            'description' => 'Voucher Makanan PizzaSkuy 10%'
        ]);
    }
}
