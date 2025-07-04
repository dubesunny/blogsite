<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'slug',
        'status'
    ];

    public function posts(){
        return $this->belongsToMany(Post::class,'posts_categories','category_id','post_id');
    }

    public function getImageAttribute($value){
        return asset('storage/'.$value);
    }
}
