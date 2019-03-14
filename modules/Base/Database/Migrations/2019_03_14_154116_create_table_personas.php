<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->char('codtra',5)->primary();
            $table->string('ap',40);
            $table->string('am',40);
             $table->string('nombres',30);
              $table->char('tipodoc',2);
              $table->string('numerodoc',20);
               $table->string('domicilio',120);
               $table->char('coddist',2)->nullable();
               $table->char('codprov',2)->nullable();
               $table->char('coddepa',2)->nullable();
               $table->string('moviles',45)->nullable();
                $table->string('referencia',45)->nullable();
                 $table->string('tiposangre',10)->nullable();
                $table->char('fnac',10)->nullable(); //fecha nacimiento
                //$table->integer('company_id'); //va en troa tabla 
                $table->integer('user_id'); 
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
