<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';
    protected $fillable = [
        'jenis',
        'kategori',
        'jumlah',
        'deskripsi',
        'sumber',
        'tanggal',
    ];
}
