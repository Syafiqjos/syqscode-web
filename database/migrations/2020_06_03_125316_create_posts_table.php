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
            $table->bigIncrements('id')->autoIncrement();
            $table->string('url',64)->unique();
            $table->string('title',64)->unique();
            $table->string('description');
            $table->longText('content');
            $table->string('cover');
            $table->string('tags');
            $table->integer('author_id')->unsigned();
            $table->bigInteger('loved')->unsigned()->default(0);
            $table->bigInteger('visited')->unsigned()->default(0);
            $table->boolean('is_deleted')->default(0);
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
