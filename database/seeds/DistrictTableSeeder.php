<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DistrictTableSeeder extends Seeder
{
    public function run() 
	{
		DB::table('district')->delete();

		$district = array(
			array('name'=>'Tetove','city_id'=> 1),
			array('name'=>'Bozofci','city_id'=> 1),
			array('name'=>'Brodeci','city_id'=> 1),
			array('name'=>'Falishti','city_id'=> 1),
			array('name'=>'Gajrja','city_id'=> 1),
			array('name'=>'Gjerma','city_id'=> 1),
			array('name'=>'Jedoarca','city_id'=> 1),
			array('name'=>'Liseci','city_id'=> 1),
			array('name'=>'Llaca','city_id'=> 1),
			array('name'=>'Otunja','city_id'=> 1),
			array('name'=>'Poroji','city_id'=> 1),
			array('name'=>'Reçica e Madhe','city_id'=> 1),
			array('name'=>'Reçica e Vogel','city_id'=> 1),
			array('name'=>'Saraqina','city_id'=> 1),
			array('name'=>'Sellca','city_id'=> 1),
			array('name'=>'Setolli','city_id'=> 1),
			array('name'=>'Shipkovica','city_id'=> 1),
			array('name'=>'Veshalla','city_id'=> 1),
			array('name'=>'Vica','city_id'=> 1),
			array('name'=>'Xhepçishti','city_id'=> 1),
			array('name'=>'Brezna','city_id'=> 1),
			array('name'=>'Dobroshti','city_id'=> 1),
			array('name'=>'Gllogja','city_id'=> 1),
			array('name'=>'Jelloshniku','city_id'=> 1),
			array('name'=>'Leshka','city_id'=> 1),
			array('name'=>'Nepreshteni','city_id'=> 1),
			array('name'=>'Nerashti','city_id'=> 1),
			array('name'=>'Odri','city_id'=> 1),
			array('name'=>'Perca','city_id'=> 1),
			array('name'=>'Pershevca','city_id'=> 1),
			array('name'=>'Sllatina','city_id'=> 1),
			array('name'=>'Tearca','city_id'=> 1),
			array('name'=>'Varvara','city_id'=> 1),
			array('name'=>'Bogovina','city_id'=> 1),
			array('name'=>'Jellovjani','city_id'=> 1),
			array('name'=>'Kamjani','city_id'=> 1),
			array('name'=>'Novaqi','city_id'=> 1),
			array('name'=>'Novosella','city_id'=> 1),
			array('name'=>'Pallçishti i Eperm','city_id'=> 1),
			array('name'=>'Pallçishti i Poshtem','city_id'=> 1),
			array('name'=>'Piroku','city_id'=> 1),
			array('name'=>'Rakoveci','city_id'=> 1),
			array('name'=>'Sellarca e Eperme','city_id'=> 1),
			array('name'=>'Selca e Keqe','city_id'=> 1),
			array('name'=>'Siniçani','city_id'=> 1),
			array('name'=>'Urviçi','city_id'=> 1),
			array('name'=>'Zherovjani','city_id'=> 1),
			array('name'=>'Bllaca','city_id'=> 1),
			array('name'=>'Bervenica','city_id'=> 1),
			array('name'=>'Çellopeku','city_id'=> 1),
			array('name'=>'Gurgurica','city_id'=> 1),
			array('name'=>'Miletina','city_id'=> 1),
			array('name'=>'Radoveci','city_id'=> 1),
			array('name'=>'Sellarca e Poshtme','city_id'=> 1),
			array('name'=>'Stençe','city_id'=> 1),
			array('name'=>'Tenova','city_id'=> 1),
			array('name'=>'Vollkovia','city_id'=> 1),
			array('name'=>'Cerova','city_id'=> 1),
			array('name'=>'Çifliku','city_id'=> 1),
			array('name'=>'Doberca','city_id'=> 1),
			array('name'=>'Grupçini','city_id'=> 1),
			array('name'=>'Kapazhdolli','city_id'=> 1),
			array('name'=>'Llerca','city_id'=> 1),
			array('name'=>'Leshnica e Eperme','city_id'=> 1),
			array('name'=>'Leshnica e Poshtme','city_id'=> 1),
			array('name'=>'Lukovica','city_id'=> 1),
			array('name'=>'Merova','city_id'=> 1),
			array('name'=>'Novosella','city_id'=> 1),
			array('name'=>'Pallatica','city_id'=> 1),
			array('name'=>'Rogli','city_id'=> 1),
			array('name'=>'Sallareva','city_id'=> 1),
			array('name'=>'Strimnica','city_id'=> 1),
			array('name'=>'Treboshi','city_id'=> 1),
			array('name'=>'Uzurmishti','city_id'=> 1),
			array('name'=>'Zhelina','city_id'=> 1),
		);

		DB::table('district')->insert($district);
	}
}

