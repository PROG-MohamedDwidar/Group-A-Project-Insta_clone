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
        //Add posts table
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->timestamps();
            $table->bigInteger('user_id')->default(12);
                

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Remove the table
        Schema::dropIfExists('posts');
    }
};
