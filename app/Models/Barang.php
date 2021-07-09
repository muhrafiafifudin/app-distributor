<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public $table = "barang";

    protected $fillable = [
        'keterangan', 
        'nama_barang', 
        'ukuran', 
        'spesifikasi',
        'harga', 
        'jumlah_lbr', 
    ];

    protected $hidden = [

    ];
}
