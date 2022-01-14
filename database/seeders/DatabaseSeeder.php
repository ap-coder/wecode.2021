<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
$this->call(UsersTableSeeder::class);
$this->call(PermissionsTableSeeder::class);
$this->call(RolesTableSeeder::class);
$this->call(PermissionRoleTableSeeder::class);

$this->call(RoleUserTableSeeder::class);
     
        $this->call(ProjectsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PageSectionsTableSeeder::class);
    }
}
