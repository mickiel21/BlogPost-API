<?php

use Illuminate\Database\Seeder;
use App\Category;
class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            'PHP',
            'Laravel',
            "JavaScript",
            "Vue JS",
            'Angular JS',
            "React Js",
            "Jquery",
            "Ajax",
        ];
        foreach ($category as $categories) {
            Category::create(['name' => $categories]);
       }
    }
}
