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
        Schema::create('NguoiDung', function (Blueprint $table) {
            $table->id();
            $table->string('Username',50);
            $table->string('Password',30);
            $table->string('HoNguoiDung',30);
            $table->string('TenNguoiDung',30);
            $table->string('NickName',30);
            $table->string('AnhDaiDien');
            $table->string('Email',50)->unique();
            $table->string('SDT',20);
            $table->foreignId('MaQuyen')->constrained('Quyen')->onDelete('cascade');
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
        Schema::drop('NguoiDung');
    }
};
