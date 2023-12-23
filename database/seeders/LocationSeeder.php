<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create(['name' => 'Dhaka']);
        Location::create(['name' => 'Comilla']);
        Location::create(['name' => 'Chittagong']);
        Location::create(['name' => "Cox's Bazaar"]);
    }
}
