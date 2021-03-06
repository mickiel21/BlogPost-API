<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreatePostSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(CreateCategorySeeder::class);
        $this->call(CreatePhotoSeeder::class);
    }
}
