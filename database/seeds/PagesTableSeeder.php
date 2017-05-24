<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages_translations')->delete();
        DB::table('pages')->delete();

        DB::table('pages')->insert(
            [
                'id' => 1,
            ]
        );
        
        DB::table('pages_translations')->insert(
        	[
                'pages_id' => 1,
	            'about' => 'About',
                'vision' => 'Vision',
                'mission' => 'Mission',
                'locale' => 'en',
        	]
        );

        DB::table('pages_translations')->insert(
        	[
                'pages_id' => 1,
	            'about' => 'Rreth nesh',
                'vision' => 'Vizioni',
                'mission' => 'Misioni',
                'locale' => 'sq',
        	]
        );
    }
}
