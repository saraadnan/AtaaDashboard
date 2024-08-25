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
        Schema::create('donations', function (Blueprint $table) {
            $table->id('donation_id');
            $table->string('donation_title'); // عنوان التبرع
            $table->longText('donation_desc')->nullable('true');//وصف التبرع
            $table->string('image')->nullable();// صورة التبرع
            $table->integer('donation_quantity');// الكمية
            $table->integer('res_quantity')->default('0');// الكمية
            $table->date('donation_exp');//تاريخ الانتهاء
            $table->string('delivery_place');// منطقة التلسيم 
            $table-> time('delivery_time');//زمن التسليم
            $table->timestamps();

            $table->unsignedInteger('donation_dir');//رقم المديرية 
            $table-> unsignedBigInteger('cat_id');// رقم الصنف
            // $table-> unsignedBigInteger('ben_id');//رقم المستفيد
            $table-> unsignedBigInteger('user_id'); // رقم المتبرع
            $table->foreign('cat_id')->references('cat_id')->on('categories');// ربط رقم الصنف بجدول الأصناف
            // $table->foreign('ben_id')->references('id')->on('beneficiaries');// ربط رقم المتسفيد بجدول المستفيدين
            $table->foreign('user_id')->references('id')->on('users');// ربط رقم المتبرع بجدول المتبرعين
            $table->foreign('donation_dir')->references('dir_id')->on('directorates');// ربط رقم المتبرع بجدول المتبرعين

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
