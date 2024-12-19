<?php

use App\Models\Order;
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
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_peminjaman_kendaraan')->nullable();
            $table->string('keperluan_peminjaman')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kendaraan_id')->constrained()->onDelete('cascade');
            $table->string('kendaraan')->nullable();
            $table->date('tanggal_waktu_peminjaman')->nullable();
            $table->string('status_laporan')->nullable();
            $table->enum('status_pinjam', ['pinjam', '', 'kembalikan', 'done'])->default('pinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};
