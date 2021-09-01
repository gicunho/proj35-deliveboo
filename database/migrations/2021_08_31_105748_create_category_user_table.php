<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_user', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
<<<<<<< HEAD:database/migrations/2021_08_30_130534_create_category_restaurant_table.php
            $table->unsignedBigInteger('restaurant_id');

=======
            $table->unsignedBigInteger('user_id');
            
>>>>>>> 3d585cf7e74d8d1bf1ab125e1b531b57918555d6:database/migrations/2021_08_31_105748_create_category_user_table.php
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_user');
    }
}
