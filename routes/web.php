<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@default');

Route::get('/page', 'PageController@check0')->name('home');
Route::get('/page/{page}', 'PageController@check');

Route::get('/tags/{tag}', 'PageController@tags0');
Route::get('/tags/{tag}/{page}', 'PageController@tags');

Route::get('/interface', function() {
    return view('interface');
});

Route::get('/blog/{url}', "BlogController@check");
Route::post('/blog/{url}', "BlogController@loved");
Route::post('/blog/{url}/comment', "BlogController@comment");

Route::get('/mails/newsletter', function(){
    return view('mails.check');
});
Route::post('/mails/newsletter','MailController@newsletter');

//MAILS PREVIEW
use \App\Subscriber;
use \App\Post;

Route::get('/mails/preview/newsletter',function() { return view('mails.newsletter'); });

//COMMENT REPLY PREVIEW
$this->target = new Subscriber();
$this->target->name = 'NekoHacker';
$this->post = new Post();
$this->post->title = 'How to make money without warning and consenquesnses';
$this->post->url = '/blog/something-is-wrong-somehow-184818h';
$this->fr = new Subscriber();
$this->fr->name = 'Alecetra';
$this->content = 'Nope, of course not. you have to do it your self otherwise buy it!';
$this->selfcontent = 'Is it free ??';
$this->unverif = 'UNVERIF_CODE';
Route::get('/mails/preview/commentreply',function() { return view('mails.commentreply',['post'=>$this->post,'from'=>$this->fr,'target'=>$this->target,'selfcontent'=>$this->selfcontent,'content'=>$this->content,'unverif'=>$this->unverif]); });

$this->linked = 'SOME_CODE';

Route::get('/mails/preview/verify-comment', function() { return view('mails.verification',['target'=>$this->target,'link'=>$this->linked]); });

Route::get('/verify','MailController@verify');

Route::get('/fpdf','ExtraController@fpdf');
Route::get('/fpdf/html',function() { return view('fpdf'); });
