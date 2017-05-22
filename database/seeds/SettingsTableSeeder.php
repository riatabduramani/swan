<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        
        DB::table('settings')->insert(
        	[
	            'company_name' => 'Company name',
                'address_sq' => 'address sq',
                'address_en' => 'address en',
                'phone' => 'phone number',
	            'email' => 'info@swan.mk',
        	]
        );
    }
}
