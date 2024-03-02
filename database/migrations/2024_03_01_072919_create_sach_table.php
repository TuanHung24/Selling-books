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
        Schema::create('sach', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loai_sach_id')->constrained('loai_sach');
            $table->string('ten',50);
            $table->string('tac_gia',60);
            $table->text('mo_ta')->nullable();
            $table->decimal('gia',9,0);
            $table->bigInteger('so_luong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sach');
    }
};
