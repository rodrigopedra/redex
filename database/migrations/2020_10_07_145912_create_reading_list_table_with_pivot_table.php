<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadingListTableWithPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_list_table_with_pivot', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        if (!Schema::hasTable('user_reading_list'))
        {
            Schema::create('users_reading_list', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id'); //FK user_id
                $table->unsignedBigInteger('reading_list_id'); //FK reading_list_id

                $table->primary(['user_id', 'reading_list_id']); //Primary

                $table->foreignId('users_id')->constrained('users')
                    ->onDelete('cascade');
                $table->foreignId('reading_list_id')->constrained('reading_lists')
                    ->onDelete('cascade');


                $table->timestamps();

            });
         }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reading_list');
        Schema::dropIfExists('reading_list');
    }
}
