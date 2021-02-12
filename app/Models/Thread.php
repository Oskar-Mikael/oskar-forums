<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function latestComment()
    {
        return $this->morphOne(Comment::class, 'commentable')->latest('id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
