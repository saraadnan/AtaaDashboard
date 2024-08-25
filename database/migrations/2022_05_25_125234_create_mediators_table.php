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
        Schema::create('mediators', function (Blueprint $table) {
            $table->id();
            $table->string('med_name');// اسم الوسيط
            $table->integer('med_phone');// رقم هاتف الوسيط
            $table->integer('med_cardnum');//  رقم هوية الوسيط
            $table-> unsignedBigInteger('user_id')->unique();// رقم المستخدم 
            $table-> unsignedBigInteger('neigh_id');// رقم الحي
            $table->foreign('neigh_id')->references('id')->on('neighborhoods');// ربط رقم الحي بجدول الأحياء
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('mediators');
    }
};
