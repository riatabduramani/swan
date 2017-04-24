<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(CustomerStatus::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(PermissionsTableSeed::class);
    }
}
