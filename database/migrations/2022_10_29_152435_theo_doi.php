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
        Schema::create('TheoDoi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('MaTruyen')->constrained('Truyen')->onDelete('cascade');
            $table->foreignId('MaNguoiDung')->constrained('users')->onDelete('cascade');
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
        Schema::drop('TheoDoi');
    }
};
