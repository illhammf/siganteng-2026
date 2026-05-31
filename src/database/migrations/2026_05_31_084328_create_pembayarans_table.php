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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reservasi_id')
                ->constrained('reservasis')
                ->cascadeOnDelete();

            $table->decimal('jumlah_bayar', 12, 2);

            $table->enum('metode_pembayaran', [
                'cash',
                'qris',
                'transfer'
            ]);

            $table->enum('status_pembayaran', [
                'belum_bayar',
                'sudah_bayar'
            ])->default('belum_bayar');

            $table->dateTime('tanggal_pembayaran')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
