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
    public function up(): void
    {
        Schema::create('Truyen', function (Blueprint $table) {
            $table->id();
            $table->string('TenTruyen',100);
            $table->string('AnhDaiDien',100);
            $table->float('DanhGiaTB');
            $table->integer('LuotXem');
            $table->text('MoTa');
            $table->enum('TrangThai', ['ngung', 'dang ra','hoan thanh']);
            $table->string('TenTacGia',100);
            $table->timestamps();

            $table->foreignId('MaNguoiDung')
                ->Constrained('NguoiDung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('Truyen');
    }
};
