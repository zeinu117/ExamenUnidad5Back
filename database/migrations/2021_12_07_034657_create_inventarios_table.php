<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("responsables_id");
            $table->integer("area_id");
            $table->date("fecha_adquisicion");
            $table->string("codigo", 255);
            $table->string("numero_folio_comprobante", 255)->nullable();
            $table->string("descripcion", 255);
            $table->string("marca", 255);
            $table->string("modelo", 255);
            $table->string("serie", 255);
            $table->integer("cantidad");
            $table->string("img");
            $table->string("nombre");
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
        Schema::dropIfExists('inventarios');
    }
}
