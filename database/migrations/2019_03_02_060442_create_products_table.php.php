<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function (Blueprint $table) {
          $table->increments('id_product');
          $table->string('seccion');
          $table->string('modelo');
          $table->string('imagen');
          $table->float('descuento');
          $table->string('link');
          $table->string('talla');
          $table->string('talla_filtrada');
          $table->float('precio_anterior');
          $table->float('precio_oferta');
          $table->string('genero');
          $table->dateTime('updated_at');
          $table->dateTime('created_at');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('products');

    }
}
