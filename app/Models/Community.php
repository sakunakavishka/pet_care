<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'communities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_type',
        'content',
        'photos',
        'question',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'photos' => 'array', // Automatically handle JSON serialization
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Community has many comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'community_id');
    }

}
