<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = []; // all columns allow mass assigne
    // protected $fillable = ['title', 'excerpt','body'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
