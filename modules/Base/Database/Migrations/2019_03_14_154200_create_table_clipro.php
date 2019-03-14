<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClipro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clipro', function (Blueprint $table) {
             $table->char('codpro',6)->primary();
            $table->string('despro',40);
            $table->string('ruc',14);
             $table->string('dir',100)->nullable();
              $table->string('nombrecomercial',50)->nullable();
              $table->integer('company_id'); 
               $table->integer('essocio');//si es la misma empresa o osciedad  
                $table->text('detalle')->nullable();//si es la misma empresa o osciedad 
            //$table->timestamps();
              $table->index('ruc');
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
        Schema::dropIfExists('clipro');
    }
}
