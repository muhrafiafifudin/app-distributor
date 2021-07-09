<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    public $table = "penjualan";

    protected $fillable = [
        'jumlah_barang',
        'jumlah_bayar',
    ];

    protected $hidden = [

    ];
}
