<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    use HasFactory;

    public function individualItems()
    {
        return $this->hasMany(IndividualItem::class, 'rental_name1', 'rental_name1');
    }
}
