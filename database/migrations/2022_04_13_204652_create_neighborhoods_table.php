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
        Schema::create('neighborhoods', function (Blueprint $table) {
            $table->id('neigh_id');
            $table->string('neigh_name');// اسم الحي
            $table-> unsignedBigInteger('dir_id');// رقم المديرية
            $table->foreign('dir_id')->references('dir_id')->on('directorates');// ربط رقم المديرية بجدول المديريات
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
        Schema::dropIfExists('neighborhoods');
    }
};
