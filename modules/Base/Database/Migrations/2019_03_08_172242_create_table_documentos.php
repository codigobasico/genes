<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->char('codocu',4)->primary;
            $table->string('desdocu',40);
            $table->char('clase',1)->nullable();
             $table->char('tipo',2)->nullable();
              $table->char('codpadre',4)->nullable();
              $table->string('modelo',60)->nullable();
              $table->string('prefijo',4)->nullable();
              $table->integer('idrep')->nullable();
              $table->text('comentario')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
