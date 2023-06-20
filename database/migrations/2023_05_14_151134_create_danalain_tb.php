<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danalain_tb', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['Pemasukan', 'Pengeluaran']);
            $table->string('keterangan');
            $table->decimal('jumlah', 16)->default();
            $table->decimal('saldo', 16)->default();
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
        Schema::dropIfExists('danalain_tb');
    }
};
