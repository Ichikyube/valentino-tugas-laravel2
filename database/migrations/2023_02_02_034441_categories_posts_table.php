<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('post_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('post_id')
                    ->references('id')->on('posts')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
