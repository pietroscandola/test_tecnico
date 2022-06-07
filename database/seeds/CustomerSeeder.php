<?php

use App\Models\Customer;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $customer = new Customer();
            $customer->name = $faker->firstname();
            $customer->surname = $faker->lastname();
            $customer->phone_number = $faker->numerify('###-#######');
            $customer->email = $faker->safeEmail();
            $customer->save();
        }
    }
}
