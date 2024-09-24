<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'tape_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tape()
    {
        return $this->belongsTo(Tape::class);
    }
}
