<?php

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::create([
            'title' => 'Test Movie One',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis posuere placerat.',
            'user_id' => 1,
        ]);
        Movie::create([
            'title' => 'Test Movie Two',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis posuere placerat.',
            'user_id' => 1,
        ]);
        Movie::create([
            'title' => 'Test Movie Three',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis posuere placerat.',
            'user_id' => 2,
        ]);
        Movie::create([
            'title' => 'Test Movie Four',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis posuere placerat.',
            'user_id' => 2,
        ]);
        Movie::create([
            'title' => 'Test Movie Five',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis posuere placerat.',
            'user_id' => 3,
        ]);
        Movie::create([
            'title' => 'Test Movie Six',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis posuere placerat.',
            'user_id' => 3,
        ]);
        Movie::create([
            'title' => 'Test Movie Seven',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis posuere placerat.',
            'user_id' => 4,
        ]);
        Movie::create([
            'title' => 'Test Movie Eight',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis posuere placerat.',
            'user_id' => 4,
        ]);
    }
}
