<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $primaryKey = 'schedule_id';
    public $incrementing = true;

    protected $fillable = [
        'route_id',
        'bus_id',
        'departure_time',
        'arrival_time',
        'status',
        'actual_departure',
        'actual_arrival',
        'notes'
    ];

    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
        'actual_departure' => 'datetime',
        'actual_arrival' => 'datetime'
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'schedule_id');
    }
}