<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('puasa_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puasa_debt_id')->constrained('puasa_debts')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah_hari');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('puasa_logs');
    }
};