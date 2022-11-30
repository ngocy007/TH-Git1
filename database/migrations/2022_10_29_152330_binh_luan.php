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
        Schema::create('BinhLuan', function (Blueprint $table) {
            $table->id();
            $table->text('NoiDungBL');
            $table->integer('DanhGia');
            $table->timestamps();

            $table->foreignId('MaTruyen')
                ->constrained('Truyen')
                ->onDelete('cascade');
            $table->foreignId('MaNguoiDung')
                ->constrained('users')
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
        Schema::drop('BinhLuan');
    }
};
