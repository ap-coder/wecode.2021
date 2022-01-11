<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Locate Contractors',
                'intro' => 'Have you ever found yourself in this situation? You need to replace a plug and it seems like a simple fix so you decide to do it yourself. You’re successful at getting out the old one and installing the new one.',
                'body_content' => '<p>In 2019, three friends Phillip, Trent, and Craig noticed a problem. Customers needed help connecting to qualified, local professionals. The same professionals needed help reaching those customers. As a solution to bring the two together, Locate.Contractors was born. Since then, we’ve helped millions of customers with their projects and are generating more annual revenue for our professionals. We’re reshaping local economies even now during this Covid Epicemic. We’re changing lives. And by staying true to the ethics of our communities and professionals, we’re getting things done.</p>',
                'published' => 1,
                'slug' => 'locate-contractors',
                'start_date' => '2022-01-11',
                'project_type' => 'full_package',
                'challenges' => '<ul><li>Building a middle account layer for a customer backend.</li><li>Created custom icons to use as awards.</li><li>Built a custom package and subscription system with a 30 free day demo.</li><li>Built a custom forum to use as directory and discussions board to interact between contractors with the necessary skills and public looking for assistance in the same area.</li></ul>',
                'solutions' => NULL,
                'meta_title' => NULL,
                'meta_description' => NULL,
                'fb_title' => NULL,
                'tw_title' => NULL,
                'fb_description' => NULL,
                'tw_description' => NULL,
                'created_at' => '2022-01-11 01:15:50',
                'updated_at' => '2022-01-11 18:11:37',
                'deleted_at' => NULL,
                'category_id' => NULL,
                'client_id' => NULL,
            ),
        ));
        
        
    }
}