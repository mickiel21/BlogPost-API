<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'mickiel oraa',
            'email'=> 'moraa@yahoo.com',
        ]);
        factory(App\User::class, 10)->create();
    }
}
