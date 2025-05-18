<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'item_name',
        'quantity',
        'unit',
        'low_stock_threshold',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation to the pet the supply belongs to.
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
    
    public function schedules()
{
    return $this->hasMany(Schedule::class);
}
}
