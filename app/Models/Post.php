<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;
protected $guarded = [];
    protected $fillable = [
        'user_id',
        'uuid',
        'title',
        'category_id',
        'description',
        'slug',
        'body',
        'excerpt'
    ];
    protected $with = ['category', 'author','photos'];
    public function scopeFilter($query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%')
        )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category)
        )
        );
        $query->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('name', $author)
        )
        );

    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function photos(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }
}
