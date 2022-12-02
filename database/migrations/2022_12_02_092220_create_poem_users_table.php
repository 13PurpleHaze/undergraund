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
        Schema::create('poem_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('poem_id');
            $table->index('poem_id', 'poem_user_poem_idx');
             $table->foreign('poem_id', 'poem_user_poem_fk')->on('poems')->references('id');

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'poem_user_user_idx');
            $table->foreign('user_id', 'poem_user_user_fk')->on('users')->references('id');

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
        Schema::dropIfExists('poem_users');
    }
};
