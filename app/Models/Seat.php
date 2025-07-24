<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $primaryKey = 'seat_id';
    public $incrementing = true;

    protected $fillable = [
        'bus_id',
        'seat_number',
        'seat_type',
        'is_available',
        'is_booked'
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'is_booked' => 'boolean',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class, 'seat_id');
    }
}