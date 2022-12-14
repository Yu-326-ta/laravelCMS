<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'is_public', 'published_at'
    ];
 
    protected $casts = [
        'is_public' => 'bool',
        'published_at' => 'datetime'
    ];

    public function scopePublic(Builder $query)
    {
        return $query->where('is_public', true);
    }
 
    public function scopePublicList(Builder $query, string $tagSlug = null)
    {
        if ($tagSlug) {
            $query->whereHas('tags', function($query) use ($tagSlug) {
                $query->where('slug', $tagSlug);
            });
        }

        return $query
            ->with('tags')
            ->public()
            ->latest('published_at')
            ->paginate(10);
    }
 
    public function scopePublicFindById(Builder $query, int $id)
    {
        return $query->public()->findOrFail($id);
    }

    public function getPublishedFormatAttribute()
    {
        return $this->published_at->format('Y年m月d日');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
    
        self::saving(function($post) {
            $post->user_id = \Auth::id();
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
