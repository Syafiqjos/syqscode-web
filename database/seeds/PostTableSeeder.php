<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            "url" => "/blog/how-to-predit-future-vj8ysddg",
            "title" => "How to predict the future",
            "description" => "Let us think sometime about the future, couse it mysteryus",
            "content"=>"<p>Gta san andreas no future</p>",
            "cover"=>"/lib/fbi.jpg",
            "tags"=>"[1],[2]",
            "author"=>"Alecetra",
            "loved"=> 0,
            "visited"=> 0
        ]);

        Post::create([
            "url" => "/blog/low-life-no-cost-s8fh8131",
            "title" => "Life without money cost",
            "description" => "Let us greet the must",
            "content"=>"<p>Gta san andreas hesoyam</p>",
            "cover"=>"/lib/glitch.jpg",
            "tags"=>"[2],[3]",
            "author"=>"Normies",
            "loved"=> 0,
            "visited"=> 0
        ]);

        Post::create([
            "url" => "/blog/ctf-writeups-vj8ysddg",
            "title" => "CastorsCTF Writeups",
            "description" => "The writes is not downed but upped",
            "content"=>"<p>Gta san andreas huckerd</p>",
            "cover"=>"/lib/stars.jpg",
            "tags"=>"[3],[4]",
            "author"=>"Syqsterr",
            "loved"=> 0,
            "visited"=> 0
        ]);
    }
}
