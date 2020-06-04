<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            "name" => "Technologies",
            "url" => "tags/technologies"
        ]);

        Tag::create([
            "name" => "CTFs",
            "url" => "tags/ctfs"
        ]);

        Tag::create([
            "name" => "Experiment",
            "url" => "tags/experiment"
        ]);

        Tag::create([
            "name" => "Coding",
            "url" => "tags/coding"
        ]);

        Tag::create([
            "name" => "Programming",
            "url" => "tags/programming"
        ]);
    }
}
