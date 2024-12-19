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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('pinjam_id')->constrained()->onDelete('cascade'); // Transaksi peminjaman terkait
            // $table->foreignId('pengembalian_id')->constrained('Pengembalian_Kendaraans')->cascadeOnDelete();
            $table->dateTime('tanggal_waktu_laporan');
            // $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();
            // $table->foreignId('karyawan_id')->constrained('karyawans')->cascadeOnDelete();
            $table->enum('kondisi_kendaraan', ['baik', 'rusak', 'butuh perbaikan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
