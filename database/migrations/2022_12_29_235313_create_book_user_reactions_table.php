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
        Schema::create('book_user_reactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reaction_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('book_id', 'book_user_reaction_book_idx');
            $table->index('user_id', 'book_user_reaction_user_idx');
            $table->index('reaction_id', 'book_user_reaction_reaction_idx');

            $table->foreign('book_id', 'book_user_reaction_book_fk')->on('books')->references('id');
            $table->foreign('user_id', 'book_user_reaction_user_fk')->on('users')->references('id');
            $table->foreign('reaction_id', 'book_user_reaction_reaction_fk')->on('reactions')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_user_reactions');
    }
};
