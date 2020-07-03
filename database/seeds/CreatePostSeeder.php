<?php

use Illuminate\Database\Seeder;
use App\Post;
class CreatePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'user_id' => '1',
            'category_id'=>'1',
            'photo_id'=> '1',
            'title'=> 'Post Number One',
            'body'=> 'Laravel is my favorite',
        ]);
        factory(App\Post::class, 10)->create();
    }
}
