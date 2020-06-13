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
            "profpic" => "/lib/authors/nekohacker.png",
            "love_title" => "Jadi gimana postnya ??",
            "love_subtitle" => '"Tambahin love nya kalo emang bagus"'
        ]);

        Author::create([
            "username" => '[ADMIN]',
            "richname" => '<p style="letter-spacing: 2px;">[ADMIN]</p>',
            "description" => 'Saya adalah Administrator dari web ini. Pen jadi Seorang Fullstack Developer.',
            "profpic" => "/lib/authors/admin.png",
            "love_title" => "Bagaimana post ini menurut kalian ?",
            "love_subtitle" => '[ Klik love dibawah kalau kalian suka ]'
        ]);

        Author::create([
            "username" => 'SyqSTerR',
            "richname" => 'SyqSTerR',
            "description" => 'Seorang Pelajar di salah satu Perguruan Tinggi. Hobi experiment dan coba - coba hal baru yang aneh - aneh. Dia lebih suka music genre Future Core dan juga suka mengapresiasi Anim dengan cara menonton. Berperan sebagai pembuat post dengan tag <a href="/tags/programming">Programming</a>, <a href="/tags/experiment">Experiment</a> dan <a href="/tags/lifehack">LifeHack</a> di website ini. Salah satunya adalah post yang kalian baca saat ini. Salam Kenal.',
            "profpic" => "/lib/authors/syqsterr.png",
            "love_title" => "Top kan postnya ??",
            "love_subtitle" => '[ Love me kalo dirasa bermanfaat ]'
        ]);

        Author::create([
            "username" => 'Alecetra',
            "richname" => 'Alecetra',
            "description" => 'Aku seorang yang mencoba untuk belajar menjadi <s>Hacker</s> anak soleh. Pada Web ini Aku berperan di tags <a href="/tags/ctfs">CTFs</a> dan <a href="/tags/lifehack">LifeHack</a> yang mengurusi banyak WriteUps.',
            "profpic" => "/lib/authors/alecetra.png",
            "love_title" => "Jadi Post nya gimana ??",
            "love_subtitle" => 'Monggo di Like post iki'
        ]);

        Author::create([
            "username" => '-]Aimaina[-',
            "richname" => '<p style="letter-spacing: 2px;">-]Aimaina[-</p>',
            "description" => 'Deskripsi Aimaina. Aimaina berfungsi sebagai Bot dan Email Sender. Aimaina mungkin tidak akan posting apapun.',
            "profpic" => "/lib/authors/aimaina.png",
            "love_title" => "Love Aimaina.",
            "love_subtitle" => 'Like Aimaina.'
        ]);
    }
}
