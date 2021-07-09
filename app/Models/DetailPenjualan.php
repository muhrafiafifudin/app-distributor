<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    public $table = "detail_penjualan";

    protected $fillable = [
        'qty',
        'subtotal',
    ];

    protected $hidden = [

    ];
}
