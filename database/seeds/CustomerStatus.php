<?php

use Illuminate\Database\Seeder;

class CustomerStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_statuses')->delete();
         
         DB::table('customer_statuses')->insert(array(
             array(
                'name' => 'Lead',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'Qualified Lead',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'Hot Lead',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
              array(
                'name' => 'Customer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
              array(
                'name' => 'Lost',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
              array(
                'name' => 'Supplier',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
          ));
    }
}
