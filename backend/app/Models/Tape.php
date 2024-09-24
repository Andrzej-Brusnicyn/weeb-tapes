<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Filters\Filterable;

class Tape extends Model
{
    use Filterable;
    use HasFactory;
	protected $fillable = [
		'title',
		'artist',
		'description',
		'price',
		'stock',
        'url',
	];
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
