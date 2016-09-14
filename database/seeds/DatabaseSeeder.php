<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');

        $this->call('CategoryTableSeeder');
        $this->command->info('Category table seeded!');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
        	'name'	    => 'Jean Gérard Bousiquot',
            'username'  => 'jgbneatdesign',
        	'email'     => 'admin@email.com',
        	'password'  => Hash::make('password'),
            'telephone' => '+50936478199',
        	'admin'	    => 1
        ]);
    }

}

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->delete();

        Category::create([
            'name'  => 'Konpa',
            'slug'  => 'konpa'
        ]);

        Category::create([
            'name'  => 'Rasin',
            'slug'  => 'rasin'
        ]);

        Category::create([
            'name'  => 'Reggae',
            'slug'  => 'reggae'
        ]);

        Category::create([
            'name'  => 'Yanvalou',
            'slug'  => 'yanvalou'
        ]);

        Category::create([
            'name'  => 'R&B',
            'slug'  => 'rb'
        ]);

        Category::create([
            'name'  => 'Rap Kreyòl',
            'slug'  => 'rap-kreyol'
        ]);

        Category::create([
            'name'  => 'Dancehall',
            'slug'  => 'dancehall'
        ]);

        Category::create([
            'name'  => 'Lòt Jan',
            'slug'  => 'Lot-jan'
        ]);

        Category::create([
            'name'  => 'Kanaval',
            'slug'  => 'kanaval'
        ]);

        Category::create([
            'name'  => 'Gospèl',
            'slug'  => 'gospel'
        ]);

        Category::create([
            'name'  => 'Levanjil',
            'slug'  => 'levanjil'
        ]);

        Category::create([
            'name'  => 'DJ',
            'slug'  => 'dj'
        ]);

        Category::create([
            'name'  => 'Rabòday',
            'slug'  => 'raboday'
        ]);

        Category::create([
            'name'  => 'Rara',
            'slug'  => 'rara'
        ]);

        Category::create([
            'name'  => 'Reggaeton',
            'slug'  => 'reggaeton'
        ]);

        Category::create([
            'name'  => 'House',
            'slug'  => 'house'
        ]);

        Category::create([
            'name'  => 'Jazz',
            'slug'  => 'jazz'
        ]);

        Category::create([
            'name'  => 'Raga',
            'slug'  => 'raga'
        ]);

        Category::create([
            'name'  => 'Soul',
            'slug'  => 'soul'
        ]);

        Category::create([
            'name'  => 'Sanba',
            'slug'  => 'sanba'
        ]);

        Category::create([
            'name'  => 'Rock & Roll',
            'slug'  => 'rock-roll'
        ]);

        Category::create([
            'name'  => 'Techno',
            'slug'  => 'techno'
        ]);

        Category::create([
            'name'  => 'Slow',
            'slug'  => 'slow'
        ]);

        Category::create([
            'name'  => 'Salsa',
            'slug'  => 'salsa'
        ]);

        Category::create([
            'name'  => 'Twoubadou',
            'slug'  => 'twoubadou'
        ]);

        Category::create([
            'name'  => 'Riddim',
            'slug'  => 'riddim'
        ]);

        Category::create([
            'name'  => 'Afro',
            'slug'  => 'afro'
        ]);

        Category::create([
            'name'  => 'Slam',
            'slug'  => 'slam'
        ]);
    }
}