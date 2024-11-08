<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected $fillable = [
        'title',
        'content',
        'excerpt',
    ];
}
