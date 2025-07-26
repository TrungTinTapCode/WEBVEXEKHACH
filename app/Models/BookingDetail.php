<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'booking_detail_id';
    public $incrementing = true;

    protected $fillable = [
        'booking_id',
        'seat_id',
        'passenger_name',
        'passenger_phone',
        'price',
        'ticket_number'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'booking_id');
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id', 'seat_id');
    }
}