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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table-> string('ben_name')->nullable();;// اسم المستفيد
            $table-> integer('ben_phone');// رقم هاتف المستفيد
            $table-> integer('ben_cardnum');// رقم هوية المتسفيد
            $table-> unsignedBigInteger('gov_id');// رقم الحي
            $table-> unsignedBigInteger('dir_id');// رقم الحي
            $table-> unsignedBigInteger('neigh_id');// رقم الحي
            $table-> unsignedBigInteger('user_id')->unique();// رقم المستخدم 
            $table-> integer('ben_degree_need');// درجة الاحتياج
            $table-> integer('allowed_in_month')->default('1');// عدد الحجوزات المسموح بحجزها
            $table-> boolean('conf_ben')->nullable(); // تأكيد احقية المستفيد


            // ربط اعمدة الرقم الثانوي بالجداول
            $table->foreign('gov_id')->references('gov_id')->on('governorates');
            $table->foreign('dir_id')->references('dir_id')->on('directoates');
            $table->foreign('neigh_id')->references('neigh_id')->on('neighborhoods');
            $table->foreign('user_id')->references('id')->on('users');
            // دالة تنشئ عمودين created_at & updated_at
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
        Schema::dropIfExists('beneficiaries');
    }
};
