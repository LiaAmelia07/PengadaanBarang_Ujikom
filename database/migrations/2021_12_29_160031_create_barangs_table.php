<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama');
            $table->integer('qty')->default(0);
            $table->date('tanggal');
            $table->biginteger('satuan_id')->unsigned();
                    //foreign
                    $table->foreign('satuan_id')
                    ->references('id')
                    ->on('satuans');
            $table->biginteger('kategori_id')->unsigned();
                    //foreign
                    $table->foreign('kategori_id')
                    ->references('id')
                    ->on('kategoris');
            $table->string('ket');
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
        Schema::dropIfExists('barangs');
    }
}
