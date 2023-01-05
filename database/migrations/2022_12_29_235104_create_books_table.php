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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->text('annotation');
            $table->string('cover');
            $table->integer('price')->nullable();
            $table->dateTime('public_start');
            $table->dateTime('public_end');
            $table->unsignedBigInteger('book_genre_id');
            $table->unsignedBigInteger('author_id');
            $table->softDeletes();

            $table->index('book_genre_id', 'book_book_genre_idx');
            $table->index('author_id', 'book_user_idx');
            $table->foreign('book_genre_id', 'book_book_genre_fk')->on('book_genres')->references('id');
            $table->foreign('author_id', 'book_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
