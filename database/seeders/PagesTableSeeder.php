<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pages')->delete();
        
        \DB::table('pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Welcome to We Code Laravel',
                'sub_title' => 'You Imagine It. We Build It!',
                'excerpt' => NULL,
                'path' => 'new',
                'slug' => 'home',
                'created_at' => '2022-01-12 23:02:41',
                'updated_at' => '2022-01-12 23:02:41',
                'deleted_at' => NULL,
                'published' => 1,
                'use_textonly_header' => 0,
                'show_title' => 1,
                'show_tagline' => 1,
                'show_featured_content' => 1,
                'use_svg_header' => 0,
                'use_featured_image_header' => 0,
                'featured_image_content' => NULL,
                'svg_masthead' => NULL,
                'title_style' => NULL,
                'tagline_style' => NULL,
                'fi_content_style' => NULL,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'facebook_title' => NULL,
                'facebook_description' => NULL,
                'twitter_title' => NULL,
                'twitter_description' => NULL,
                'add_to_sitemap' => 1,
                'custom_css' => NULL,
            ),
        ));
        
        
    }
}