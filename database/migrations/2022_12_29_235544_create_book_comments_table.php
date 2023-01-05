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
        Schema::create('book_comments', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id', 'book_comment_user_idx');
            $table->index('book_id', 'book_comment_book_idx');
            $table->foreign('user_id', 'book_comment_user_fk')->on('users')->references('id');
            $table->foreign('book_id', 'book_comment_book_fk')->on('books')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_comments');
    }
};
