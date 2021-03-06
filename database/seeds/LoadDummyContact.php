<?php

use Illuminate\Database\Seeder;

class LoadDummyContact extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$faker = Faker\Factory::create();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('contacts')->insert([
                'name' => $faker->name
            ]);
        }
    }
}
