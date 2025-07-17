<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';
    public $incrementing = true;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'id_card',
        'address'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }
}