<?php

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
        $this->call(UserSeeder::class);
        $this->call(TagSeeder::class);
<<<<<<< HEAD
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
=======
        $this->call(PostSeeder::class);
        $this->call(CategorySeeder::class);
>>>>>>> 5c8bbd26bdd23b34ce0e8022d042f5b743bdda9e
    }
}
