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
        Schema::create('docencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professor_id');
            $table->foreign('professor_id')->references('id')->on('professores');
            $table->unsignedBigInteger('disciplina_id');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
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
        Schema::dropIfExists('docencia');
    }
};
