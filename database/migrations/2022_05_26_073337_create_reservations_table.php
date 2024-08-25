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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('res_id');
            $table->integer('res_month_id');// الشهر
            $table->string('donation_sign');// الشهر
            $table->boolean('delivery_conf');// تأكيد التسليم
            $table->integer('evaluation');
            $table->timestamps();


            $table-> unsignedBigInteger('res_donr_id');// رقم التبرع
            $table-> unsignedBigInteger('res_user_id');// رقم المستفيد الحاجز للتبرع

            $table->foreign('res_donr_id')->references('donation_id')->on('donations');// ربط رقم التبرع بجدول التبرعات
            $table->foreign('res_user_id')->references('id')->on('users');// ربط رقم المستفيد بجدول المستفيدين

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
