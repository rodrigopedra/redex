<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained('users')
                // this option tells the database
                // to automatically remove a record from
                // the favorites table when the corresponding
                // user is deleted. It is a database feature
                // not a Laravel feature
                ->cascadeOnDelete();

            $table->foreignId('book_id')
                ->constrained('books')
                ->cascadeOnDelete();

            // having the primary key as a composite key
            // composed of `user_id` and `book_id` will ensure
            // at the database level that a user cannot
            // be related more than once to the same book.
            $table->primary(['user_id', 'book_id']);

            // Keeping the timestamps here is optional for a pivot table,
            // but I think it is a good idea for reports, or to show
            // the user when they favorited a book.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
