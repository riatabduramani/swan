<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
    
        DB::table('permissions')->delete();

        DB::table('permissions')->insert(array(
            array(
                'name' => 'create-customer',
                'display_name' => 'Create Customer',
                'description' => 'Create Customer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
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
                'name' => 'create-potential-customer',
                'display_name' => 'Edit Potential Customer',
                'description' => 'Edit Customer',
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
                'name' => 'delete-invoice',
                'display_name' => 'Delete Invoice',
                'description' => 'Delete Invoice',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
             array(
                'name' => 'manage-statuses',
                'display_name' => 'Manage Customer Statuses',
                'description' => 'Manage Potential Customer Statuses',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
              array(
                'name' => 'transfer-potential-to-customer',
                'display_name' => 'Transfer to Customer',
                'description' => 'Can transfer potential to customer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
               array(
                'name' => 'change-customer-login-status',
                'display_name' => 'Change customer login status',
                'description' => 'Can change login status for a customer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
               array(
                'name' => 'view-documents',
                'display_name' => 'View attached documents',
                'description' => 'View attached document in customer profile',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
                array(
                'name' => 'upload-documents',
                'display_name' => 'Attach documents',
                'description' => 'Can attach document in customer profile',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ),
          ));



        DB::table('permission_role')->insert(array(
            array(
                'permission_id' => 1,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 2,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 3,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 4,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 5,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 6,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 7,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 8,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 9,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 10,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 11,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 12,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 13,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 14,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 15,
                'role_id' => 1,
            ),  
            array(
                'permission_id' => 16,
                'role_id' => 1,
            ), 
            array(
                'permission_id' => 17,
                'role_id' => 1,
            ), 
            array(
                'permission_id' => 18,
                'role_id' => 1,
            ),
            array(
                'permission_id' => 19,
                'role_id' => 1,
            ), 
            array(
                'permission_id' => 20,
                'role_id' => 1,
            ),  
            array(
                'permission_id' => 21,
                'role_id' => 1,
            ),            
        ));
    }
 }

