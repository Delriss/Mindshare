<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    // Define the relationship between Tag and BlogPost
    public function blogPosts() : BelongsToMany
    {
        return $this->belongsToMany(BlogPost::class);  
    }

    // Define the fillable fields
    protected $fillable = [
        'id',
        'title'
    ];
}
