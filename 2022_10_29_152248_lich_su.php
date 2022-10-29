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
        Schema::create('LichSu', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('MaNguoiDung')->constrained('NguoiDung')->onDelete('cascade');
            $table->foreignId('MaTruyen')->constrained('Truyen')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('LichSu');
    }
};
