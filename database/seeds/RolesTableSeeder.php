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
                'name' => 'superadmin',
                'display_name' => 'Super Admin',
                'description' => 'Super Admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'employee',
                'display_name' => 'Employee',
                'description' => 'Employee',
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
    
        DB::table('permissions')->delete();

        DB::table('permissions')->insert(array(
            array(
                'name' => 'edit-customer',
                'display_name' => 'Edit Customer',
                'description' => 'Edit Customer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'view-customer',
                'display_name' => 'View Customer',
                'description' => 'View Customer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'delete-customer',
                'display_name' => 'Delete Customer',
                'description' => 'Delete Customer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'edit-potential-customer',
                'display_name' => 'Edit Potential Customer',
                'description' => 'Edit Customer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'view-potential-customer',
                'display_name' => 'View Potential Customer',
                'description' => 'View Customer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'delete-potential-customer',
                'display_name' => 'Delete Potential Customer',
                'description' => 'Delete Customer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'manage-packet',
                'display_name' => 'Manage packet',
                'description' => 'Manage packet',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'create-task',
                'display_name' => 'Create Task',
                'description' => 'Create Task',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'create-comment',
                'display_name' => 'Create Comment',
                'description' => 'Create Comment',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'create-packetinvoice',
                'display_name' => 'Create Packet Invoice',
                'description' => 'Create Packet Invoice',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'delete-packetinvoice',
                'display_name' => 'Delete Packet Invoice',
                'description' => 'Delete Packet Invoice',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'update-paymentstatus',
                'display_name' => 'Update Payment Status',
                'description' => 'Update Payment Status',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'view-listedinvoices',
                'display_name' => 'View Customer Invoices',
                'description' => 'View Customer Invoices',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'create-custominvoice',
                'display_name' => 'Create Custom Invoice',
                'description' => 'Create Custom Invoice',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'delete-packetcustominvoice',
                'display_name' => 'Delete Custom Invoice',
                'description' => 'Delete Custom Invoice',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
          ));
    }
}
