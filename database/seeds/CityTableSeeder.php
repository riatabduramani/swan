<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder {
	
	public function run() 
	{
		DB::table('cities')->delete();

		$cities = array(
			array('name' => 'Tetove', 'country_id' => 128),
		);

		DB::table('cities')->insert($cities);
	}
}