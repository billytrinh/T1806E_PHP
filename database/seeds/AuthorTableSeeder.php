<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Author::class,100)->create();
        factory(App\Nxb::class,100)->create();
        factory(App\Book::class,1000)->create();
    }
}
