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
        //---create post table---//

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('User_id');///----inclued user_id---//
            $table->string('caption');
            $table->string('image');
            $table->timestamps();
            $table->index('User_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }

};
