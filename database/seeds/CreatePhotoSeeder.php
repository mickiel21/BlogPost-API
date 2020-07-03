<?php

use Illuminate\Database\Seeder;
use App\Photo;
class CreatePhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::create([
            'file' => 'sample.jpg',
        ]);
        factory(App\Photo::class, 10)->create();
    }
}
