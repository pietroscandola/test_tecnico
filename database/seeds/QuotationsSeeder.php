<?php

use App\Models\Quotation;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class QuotationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $quotation = new Quotation();
            $quotation->price = $faker->randomFloat(1, 10, 50);
            $quotation->description = $faker->paragraph();
            $quotation->save();
        }
    }
}
