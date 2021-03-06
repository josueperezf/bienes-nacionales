<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('denominacion_id')->unsigned();
            $table->integer('marca_id')->unsigned();
            $table->string('codigo',10)->unique();
            $table->string('serial',20)->unique();
            $table->float('monto');
            $table->string('descripcion',200)->nullable();
            $table->foreign('denominacion_id')->references('id')->on('denominacions')->onDelete('cascade');
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
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
        Schema::dropIfExists('biens');
    }
}
