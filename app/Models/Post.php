<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = []; // all columns allow mass assigne
    // protected $fillable = ['title', 'excerpt','body'];

    protected $with = ['author', 'category'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function scopeFilter($query, $filter) {
        $query->when($filter['search'] ?? false, fn ($query, $search) =>
            $query->where(fn ($query) => 
                $query->where('title', 'like', '%'.$search.'%')
                    ->orwhere('body', 'like', '%'.$search.'%')
            )
        );

        $query->when($filter['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn ($query) => 
                $query->where('slug', $category )
            )
        );

        $query->when($filter['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author', fn ($query) => 
                $query->where('username', $author)
            )
        );
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
