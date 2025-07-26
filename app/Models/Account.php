<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use Notifiable;

    protected $table = 'account';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'phone_number',
        'password',
        'email',
        'dia_chi',
        'ngay_sinh',
        'gender'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function customer()
    {
        
        return $this->hasOne(Customer::class, 'phone_number', 'phone_number');
    }
}