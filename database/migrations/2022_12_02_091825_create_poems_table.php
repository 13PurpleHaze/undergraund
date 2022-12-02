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
        Schema::create('poems', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');

            $table->unsignedBigInteger('author_id')->nullable();
            $table->index('author_id', 'poem_author_idx');
            $table->foreign('author_id', 'poem_author_fk')->on('authors')->references('id');

            $table->unsignedBigInteger('level_id')->nullable();
            $table->index('level_id', 'poem_level_idx');
            $table->foreign('level_id', 'poem_level_fk')->on('levels')->references('id');

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
        Schema::dropIfExists('poems');
    }
};
