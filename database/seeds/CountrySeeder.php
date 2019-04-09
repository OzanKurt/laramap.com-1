<?php

use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries as ListOfCountries;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = ListOfCountries::all();

        foreach ($countries as $country) {
            \App\Models\Country::create([
                'name' => $country->name->common,
            ]);
        }
    }
}
