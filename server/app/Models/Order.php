<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function biker()
    {
        return $this->belongsTo(User::class, 'biker_id', 'id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
}
