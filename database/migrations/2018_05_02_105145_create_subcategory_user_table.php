<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory_user', function (Blueprint $table) {
               $table->index(['user_id', 'subcategory_id']);
               $table->unsignedInteger('user_id');
               $table->unsignedInteger('subcategory_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
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
        Schema::dropIfExists('subcategory_user');
    }
}
