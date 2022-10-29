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
        Schema::create('CT_Loai', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('MaTruyen')
                ->constrained('Truyen')
                ->onDelete('cascade');
            $table->foreignId('MaLoai')
                ->constrained('TheLoai')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CT_Loai');
    }
};
