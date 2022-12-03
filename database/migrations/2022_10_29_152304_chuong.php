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
        Schema::create('Chuong', function (Blueprint $table) {
            $table->id();
            $table->foreignId('MaTruyen')->constrained('Truyen')->onDelete('cascade');
            $table->string('TenChuong',100);
            $table->text('NoiDung');
            $table->integer('SoChuong');
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
        Schema::drop('Chuong');
    }
};
