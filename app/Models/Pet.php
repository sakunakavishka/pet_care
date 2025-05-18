<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'breed',
        'age',
        'weight',
        'featured_image',
        'gallery_images',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    // public function activities()
    // {
    //     return $this->hasMany(Activity::class);
    // }

    public function healthRecords()
    {
        return $this->hasMany(HealthRecord::class);
    }

    public function supplies()
    {
        return $this->hasMany(Supply::class);
    }
}
