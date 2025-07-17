<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $primaryKey = 'report_id';
    public $incrementing = true;

    protected $fillable = [
        'report_type',
        'report_date',
        'parameters',
        'file_path'
    ];

    protected $casts = [
        'report_date' => 'date',
        'parameters' => 'array'
    ];
}