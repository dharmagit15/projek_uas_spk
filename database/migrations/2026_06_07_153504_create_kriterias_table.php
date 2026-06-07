<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // Menyimpan C1, C2, dst.
            $table->string('nama');           // Menyimpan nama keterangan kriteria
            $table->enum('jenis', ['Benefit', 'Cost']); // Atribut kriteria
            $table->decimal('bobot', 4, 2);   // Menyimpan desimal seperti 0.30, 0.20
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kriterias');
    }
};