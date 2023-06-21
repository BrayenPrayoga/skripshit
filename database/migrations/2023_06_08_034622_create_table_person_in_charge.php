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
        Schema::create('person_in_charge', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('week')->nullable();
            $table->string('area')->nullable();
            $table->string('area_pic')->nullable();
            $table->integer('TT_NUMBER')->nullable();
            $table->string('customer')->nullable();
            $table->string('SEGMENT_ID')->nullable();
            $table->integer('CID')->nullable();
            $table->integer('TR_CID')->nullable();
            $table->string('span')->nullable();
            $table->integer('id_fo_cut')->nullable();
            $table->string('NE_IMPACT')->nullable();
            $table->integer('IMPACT_TT')->nullable();
            $table->string('ring')->nullable();
            $table->integer('start_time')->nullable();
            $table->integer('stop_clock')->nullable();
            $table->integer('end_time')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('root_cause')->nullable();
            $table->integer('status')->nullable();
            $table->integer('aging_time')->nullable();
            $table->string('remark')->nullable();
            $table->longText('note')->nullable();
            $table->integer('status_pic')->nullable();
            $table->integer('ceklis')->nullable();
            $table->integer('id_type_kabel')->nullable();
            $table->integer('tikor')->nullable();
            $table->string('time_travel')->nullable();
            $table->integer('time_tracking')->nullable();
            $table->integer('join_cut_point')->nullable();
            $table->integer('SLA_TROUBLESHOOT')->nullable();
            $table->integer('cut_point')->nullable();
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
        Schema::dropIfExists('person_in_charge');
    }
};
