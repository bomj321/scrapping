<?php

use Illuminate\Support\Facades\DB;
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
          $table->string('marca');
          $table->string('modelo');
          $table->string('imagen');
          $table->float('descuento');
          $table->string('link');
          $table->string('talla');
          $table->string('talla_filtrada');
          $table->string('precio_anterior');
          $table->string('precio_oferta');
          $table->string('precio_filtrada');
          $table->string('genero');
          $table->string('filtros');
          $table->dateTime('updated_at');
          $table->dateTime('created_at');
      });

       // Full Text Index
      DB::statement('ALTER TABLE products ADD FULLTEXT fulltext_index (filtros)');
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
