<?php

use App\Models\Offer;
use App\Models\Customer;
use App\Models\Quotation;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $offer_ids = Offer::all('id');

        $quotation_ids = Quotation::pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            $customer = new Customer();
            $customer->name = $faker->firstname();
            $customer->surname = $faker->lastname();
            $customer->phone_number = $faker->numerify('###-#######');
            $customer->email = $faker->safeEmail();
            $customer->quotation_id = Arr::random($quotation_ids);
            $customer->save();
        }

        $customer->each(function (App\Models\Customer $customer) use ($offer_ids) {
            $customer->offers()->attach(
                $offer_ids->random(rand(0, 4))->pluck('id')->toArray()
            );
        });
    }
}
