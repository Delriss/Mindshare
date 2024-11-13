<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogPost extends Model
{
    use HasFactory;

    // Set DateTime fields for Carbon instance
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define the relationship between BlogPost and Tag
    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    // Define the relationship between BlogPost and User
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Define the fillable fields
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'user_id',
    ];
}
