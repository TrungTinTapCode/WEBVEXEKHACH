<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'title',
        'image',
        'price',
        'departure',
        'destination',
        'old_price',
        'is_active',
        
    ];

    // Nếu cần định dạng kiểu dữ liệu cho cột (không bắt buộc)
    protected $casts = [
        'price' => 'decimal:0',
        'old_price' => 'decimal:0',
    ];

    // Quan hệ: Một tuyến có thể có nhiều lịch trình
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
