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
            "name" => "Programming",
            "url" => "tags/programming"
        ]);

        Tag::create([
            "name" => "CTFs",
            "url" => "tags/ctfs"
        ]);

        Tag::create([
            "name" => "Tutorial",
            "url" => "tags/tutorial"
        ]);

        Tag::create([
            "name" => "LifeHack",
            "url" => "tags/lifehack"
        ]);

        Tag::create([
            "name" => "Experiment",
            "url" => "tags/experiment"
        ]);

        Tag::create([
            "name" => "Problem Solving",
            "url" => "tags/problem-solving"
        ]);

        Tag::create([
            "name" => "Hacking",
            "url" => "tags/hacking"
        ]);
    }
}
