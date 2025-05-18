<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'supply_id', // Added supply_id
        'type',
        'time',
        'date',
        'status',
        'amount', // Added amount
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
    
    public function supply()
{
    return $this->belongsTo(Supply::class);
}
}
