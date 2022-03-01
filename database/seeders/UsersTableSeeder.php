<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$IRLBizodd9ckgpU8dKv4P..b1G/8sUHn3Cyulc0v9ayXSJmMXKi3i',
                'approved' => 1,
                'verified' => 1,
                'verified_at' => '2021-12-22 23:42:48',
                'verification_token' => '',
                'remember_token' => NULL,
                'company_name' => '',
                'client_type' => '',
                'phone_number' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}