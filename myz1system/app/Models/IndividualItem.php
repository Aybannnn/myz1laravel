<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualItem extends Model
{
    use HasFactory;

    public function bookingRequest()
    {
        return $this->belongsTo(BookingRequest::class, 'rental_name1', 'rental_name1');
    }
}
