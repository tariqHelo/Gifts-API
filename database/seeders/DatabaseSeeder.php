<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Product;

use App\Models\Brand;
use App\Models\Personalization;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create();
         Product::factory(20)->create();

         Brand::factory(10)->create();
         Personalization::factory(10)->create();

         //\App\Models\User::factory(2)->create();
         $this->call([
           PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
         ]);
     }
}
