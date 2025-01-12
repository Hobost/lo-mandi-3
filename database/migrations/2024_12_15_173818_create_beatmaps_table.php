<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('beatmaps', function (Blueprint $table) {
            $table->id();
            $table->string('mod_id')->nullable();
            $table->string('beatmap_id');
            $table->string('beatmapset_id');
            $table->string('title');
            $table->string('version'); // diff name
            $table->string('artist');
            $table->string('creator');
            $table->string('cover_card_url')->nullable();
            $table->float('bpm');
            $table->float('difficulty_rating');
            $table->float('ar'); // AR
            $table->float('cs'); // CS
            $table->float('accuracy'); // OD
            $table->float('drain'); // HP
            $table->integer('total_length'); // song length ?????? api docs unclear change later or dont use
            $table->unsignedBigInteger('stage_id')->nullable();

            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
        
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beatmaps');
    }
};
