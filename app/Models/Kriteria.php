<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan kolom diisi melalui form
    protected $fillable = ['kode', 'nama', 'jenis', 'bobot'];
}