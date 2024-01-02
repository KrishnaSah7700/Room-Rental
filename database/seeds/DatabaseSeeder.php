<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        // User::factory(100)->create();
        Product::factory(100)->create();
    }
}
