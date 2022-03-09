<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang_masuk');
            $table->date('tanggal_masuk');

            $table->biginteger('supplier_id')->unsigned();
                    //foreign
                    $table->foreign('supplier_id')
                    ->references('id')
                    ->on('suppliers');

            $table->biginteger('barang_id')->unsigned();
                    //foreign
                    $table->foreign('barang_id')
                    ->references('id')
                    ->on('barangs');

            $table->integer('qty');

            $table->biginteger('user_id')->unsigned();
                    //foreign
                    $table->foreign('user_id')
                    ->references('id')
                    ->on('users');

            $table->biginteger('pengajuan_id')->unsigned();
                    //foreign
                    $table->foreign('pengajuan_id')
                    ->references('id')
                    ->on('pengajuans');

            $table->integer('harga');

            $table->integer('perkiraan_biaya');

            $table->integer('satuan_id');

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
        Schema::dropIfExists('barang_masuks');
    }
}
