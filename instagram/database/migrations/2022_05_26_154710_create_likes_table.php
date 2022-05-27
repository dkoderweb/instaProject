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
        //---create like table--//
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('State')->nullable();
            $table->unsignedBigInteger('user_id');//---inclued user_id ---//
            $table->unsignedBigInteger('post_id');//---inclued post_id ---//
             
            
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
        Schema::dropIfExists('likes');
    }
};
