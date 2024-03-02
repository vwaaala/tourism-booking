<?php

namespace Bunker\TourismBooking\Database\Seeders;

use Bunker\TourismBooking\Models\RegionLang;
use Illuminate\Database\Seeder;
use Bunker\TourismBooking\Models\Region; // Adjust the namespace for the Region model


class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = Region::create([
            'uuid' => str()->uuid(),
            'thumbnail' => 'thumbnail.png',
            'status' => true
        ]);

        RegionLang::create(['region_id' => $region->id, 'lang' => 'en', 'name' => 'Asia']);
        RegionLang::create(['region_id' => $region->id, 'lang' => 'bd', 'name' => 'এশিয়া']);
    }
}
