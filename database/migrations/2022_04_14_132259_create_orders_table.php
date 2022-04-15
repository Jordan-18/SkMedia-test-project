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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nomor');
            $table->bigInteger('id_admin');
            $table->bigInteger('id_transport');
            $table->bigInteger('id_driver');
            $table->bigInteger('id_approver');
            $table->timestamp('awal_pinjam');
            $table->timestamp('akhir_pinjam')->nullable();
            $table->integer('bbm_awal');
            $table->integer('bbm_akhir')->nullable();
            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('orders');
    }
};
