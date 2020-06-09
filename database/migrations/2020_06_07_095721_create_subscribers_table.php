<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('name',64)->unique();
            $table->string('email',128);
            $table->boolean('verified')->default(false);
            $table->boolean('newsletter')->default(false);
            $table->integer('salt')->unsigned()->default(0);
            $table->string('reply_verif_link')->default('');
            $table->string('reply_unverif_link')->default('');
            $table->string('newsletter_verif_link')->default('');
            $table->string('newsletter_unverif_link')->default('');
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
        Schema::dropIfExists('subscribers');
    }
}
