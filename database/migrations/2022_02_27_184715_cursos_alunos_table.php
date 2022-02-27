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
          Schema::create('cursos_alunos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_cursos')->references('id')->on('cursos');
            $table->bigInteger('id_aluno')->references('id')->on('alunos');         
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
        Schema::dropIfExists('cursos_alunos');
    }
};
