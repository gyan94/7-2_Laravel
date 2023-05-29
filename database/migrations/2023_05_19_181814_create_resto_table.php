<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("email")->unique();
            $table->string("password");
            $table->string("google_id")->nullable();
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name', 64);
            $table->string('area', 64);
            $table->string('genre', 64);
            $table->string('address', 255)->nullable(true);
            $table->string('comment', 512);
            $table->unsignedBigInteger('user_id');
            // $table->integer('like_count')->nullable(true);
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('posts');
    }
}

