<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tmatches', function (Blueprint $table) {
            $table->id();
            $table->integer('match_number');
            $table->unsignedBigInteger('player1_id')->nullable();
            $table->unsignedBigInteger('player2_id')->nullable();
            $table->dateTime('match_datetime')->nullable();
            $table->integer('player1_score')->nullable();
            $table->integer('player2_score')->nullable();
            $table->string('match_url')->nullable();
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->timestamps();

            $table->foreign('player1_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('player2_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tmatches');
    }
};
