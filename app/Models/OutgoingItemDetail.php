<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingItemDetail extends Model
{
    use HasFactory;

    protected $table = 'outgoing_item_details';

    protected $guarded = [];
}
