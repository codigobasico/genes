<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuariosCentros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_centros', function (Blueprint $table) {
            $table->increments('id');
            $table->char('codcen',4);
            $table->integer('user_id');
            $table->softDeletes(); 
            $table->foreign('codcen')->references('codcen')->on('centros');
           // $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('usuarios_centros');
    }
}
