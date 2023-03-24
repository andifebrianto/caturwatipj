<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Profil;
use App\Models\Category;
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
        User::create([
            'name' => 'Andi',
            'username' => 'andifebrianto',
            'email' => 'andi@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::factory(3)->create();
        Category::factory(20)->create();
        Book::factory(100)->create();
        Profil::factory(1)->create();
    }
}
