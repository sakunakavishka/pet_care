<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'record_type',
        'description',
        'date',
        'document',
        'photo',
    ];

    protected $casts = [
        'date' => 'date', // Ensure the date is cast to a Carbon instance
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
