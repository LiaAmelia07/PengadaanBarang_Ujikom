<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('kode_pengajuan');
            $table->biginteger('barang_id')->unsigned();
                    //foreign
                    $table->foreign('barang_id')
                    ->references('id')
                    ->on('barangs');
            $table->integer('qty');
            $table->integer('perkiraan_biaya');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('pengajuans');
    }
}
