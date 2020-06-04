<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url',64)->unique();
            $table->string('title',64)->unique();
            $table->string('description');
            $table->longText('content');
            $table->string('cover');
            $table->string('tags');
            $table->string('author');
            $table->bigInteger('loved')->unsigned();
            $table->bigInteger('visited')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
