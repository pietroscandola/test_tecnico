<?php

use App\Models\Offer;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;



class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $offer = new Offer();
            $offer->name = $faker->word();
            $offer->price = $faker->randomFloat(1, 10, 50);
            $offer->description = $faker->paragraph();
            $offer->save();
        }
    }
}
