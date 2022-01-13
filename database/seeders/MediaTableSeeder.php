<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media')->delete();
        
        \DB::table('media')->insert(array (
            0 => 
            array (
                'id' => 1,
                'model_type' => 'App\\Models\\Post',
                'model_id' => 1,
                'uuid' => '8225e54f-e665-4037-a250-3d087a71c841',
                'collection_name' => 'featured_image',
                'name' => '2020_hummer_ev_reveal_infinityroof_013_gmc_hummer_bt1xx_fn_roofoff_v1_0',
                'file_name' => '2020_hummer_ev_reveal_infinityroof_013_gmc_hummer_bt1xx_fn_roofoff_v1_0.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 325133,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"preview":true}}',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2022-01-11 01:00:24',
                'updated_at' => '2022-01-11 01:00:24',
            ),
            1 => 
            array (
                'id' => 2,
                'model_type' => 'App\\Models\\Project',
                'model_id' => 1,
                'uuid' => 'a4dfdf20-d6ab-408d-b7a3-39d18cbf040b',
                'collection_name' => 'featured_image',
                'name' => 'locate_contractors',
                'file_name' => 'locate_contractors.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 1620585,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"preview":true,"portfolio":true,"featured":true,"solution":true,"challenge":true}}',
                'responsive_images' => '[]',
                'order_column' => 2,
                'created_at' => '2022-01-11 18:12:09',
                'updated_at' => '2022-01-11 19:00:44',
            ),
            2 => 
            array (
                'id' => 3,
                'model_type' => 'App\\Models\\User',
                'model_id' => 2,
                'uuid' => 'c2f7f9cd-0f48-4c23-b38a-d18ba165fc41',
                'collection_name' => 'avatar',
                'name' => 'lc_logo',
                'file_name' => 'lc_logo.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 9171,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"preview":true,"avatar":true,"logo":true}}',
                'responsive_images' => '[]',
                'order_column' => 3,
                'created_at' => '2022-01-11 19:21:19',
                'updated_at' => '2022-01-11 21:41:58',
            ),
            3 => 
            array (
                'id' => 4,
                'model_type' => 'App\\Models\\User',
                'model_id' => 2,
                'uuid' => '6ceb4725-df3b-445f-8025-802fa433324e',
                'collection_name' => 'logo',
                'name' => 'lc_logo',
                'file_name' => 'lc_logo.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 9171,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"preview":true,"avatar":true,"logo":true}}',
                'responsive_images' => '[]',
                'order_column' => 4,
                'created_at' => '2022-01-11 19:22:03',
                'updated_at' => '2022-01-11 19:22:03',
            ),
        ));
        
        
    }
}