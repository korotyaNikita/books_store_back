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
        Schema::create('basket_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('basket_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('book_id', 'basket_books_book_idx');
            $table->index('basket_id', 'basket_books_basket_idx');

            $table->foreign('book_id', 'basket_books_book_fk')->on('books')->references('id');
            $table->foreign('basket_id', 'basket_books_basket_fk')->on('baskets')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket_books');
    }
};
