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
        Schema::create('directorates', function (Blueprint $table) {
            $table->id('dir_id');
            $table->string('dir_name');// اسم المديرية
            $table-> unsignedBigInteger('gov_id');// رقم المحافظة
            $table->timestamps();
            $table->foreign('gov_id')->references('gov_id')->on('governorates');//ربط رقم المحافظة بجدول المحافظات
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorates');
    }
};
