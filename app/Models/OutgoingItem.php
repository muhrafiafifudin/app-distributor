<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingItem extends Model
{
    use HasFactory;

    protected $table = 'outgoing_items';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function outgoing_item_detail()
    {
        return $this->hasMany(OutgoingItemDetail::class, 'outgoing_item_id', 'id');
    }
}
