<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $primaryKey = 'bus_id';
    protected $keyType = 'string';
    public $incrementing = true;

    protected $fillable = [
        'license_plate',
        'bus_name',
        'bus_type',
        'total_seats',
        'amenities',
        'is_active' 
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class, 'bus_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'bus_id');
    }
}