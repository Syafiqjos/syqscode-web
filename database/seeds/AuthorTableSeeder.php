<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            "username" => 'NekoHacker',
            "richname" => '<s>Neko</s><i>Hacker</i>',
            "description" => '"Just a cat playing a pussy, never let you guard but leave it behind the urgent circumtancesy until you can defeat the deadly toxic inside yours."',
            "profpic" => "/lib/logo-icon.png",
            "love_title" => "Jadi gimana postnya ??",
            "love_subtitle" => '"Tambahin love nya kalo emang bagus"'
        ]);
    }
}
