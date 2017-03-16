<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('roles')->delete();
         
         DB::table('roles')->insert(array(
             array(
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'agent',
                'display_name' => 'Agent',
                'description' => 'Agent',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'client',
                'display_name' => 'Client',
                'description' => 'Client',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
          ));
    }
}
