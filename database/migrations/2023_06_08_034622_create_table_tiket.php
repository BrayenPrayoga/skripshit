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
        Schema::create('tiket', function (Blueprint $table) {
            $table->id();
            $table->integer('id_master_transaksi_customer')->nullable();
            $table->integer('TT_FLP')->nullable();
            $table->integer('id_master_area')->nullable();
            $table->string('span_problem')->nullable();
            $table->integer('ring')->nullable();
            $table->string('CID')->nullable();
            $table->string('span_length')->nullable();
            $table->integer('id_master_category')->nullable();
            $table->dateTime('down_time')->nullable();
            $table->dateTime('clear_time')->nullable();
            $table->integer('duration')->nullable();
            $table->string('root_cause')->nullable();
            $table->string('problem_location')->nullable();
            $table->integer('status')->nullable();
            $table->integer('id_master_vendor')->nullable();
            $table->integer('PIC')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('tiket');
    }
};
