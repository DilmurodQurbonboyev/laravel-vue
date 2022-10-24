<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authority_id');
            $table->string('title')->nullable();
            $table->string('locale')->index();
            $table->unique(['authority_id', 'locale']);
            $table->foreign('authority_id')->references('id')->on('authorities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority_translations');
    }
}
