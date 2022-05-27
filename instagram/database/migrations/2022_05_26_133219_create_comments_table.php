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

        //---create comment table---//
        Schema::create('comments', function (Blueprint $table) {
            
            
             $table->increments('id');
            $table->unsignedBigInteger('user_id');//---inclued user_id---//
           $table->unsignedBigInteger('post_id');//---inclued profile_id ---//
             $table->text('body');
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
        Schema::dropIfExists('comments');
    }
};
