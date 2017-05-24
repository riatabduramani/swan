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
        DB::table('settings_translations')->delete();
        DB::table('settings')->delete();

        DB::table('settings')->insert(
            [
                'phone' => '+389 (0) 70 123 456',
                'email' => 'info@swan.mk',
            ]
        );
        
        DB::table('settings_translations')->insert(
        	[
                'settings_id' => 1,
	            'company_name' => 'Company name SQ',
                'address' => 'address sq',
                'locale' => 'sq',
        	]
        );

        DB::table('settings_translations')->insert(
            [
                'settings_id' => 1,
                'company_name' => 'Company name EN',
                'address' => 'address en',
                'locale' => 'en',
            ]
        );
    }
}
