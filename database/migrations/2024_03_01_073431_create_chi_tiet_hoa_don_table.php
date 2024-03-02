<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chi_tiet_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hoa_don_id')->constrained('hoa_don');
            $table->foreignId('sach_id')->constrained('sach');
            $table->integer("so_luong");
            $table->decimal("don_gia",10,0);
            $table->decimal("thanh_tien",10,0);
            $table->boolean("trang_thai")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_hoa_don');
    }
};
