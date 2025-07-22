<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'slug',
        'image',
        'excerpt',
        'description',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'posts_categories','post_id','category_id');
    }

    public function getImageAttribute($value){
        return asset('storage/'.$value);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function getShortExcerptAttribute(){
        return Str::words($this->excerpt,25,'.');
    }
}
