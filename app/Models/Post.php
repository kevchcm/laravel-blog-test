<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Post
 *
 * @mixin Eloquent
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'excerpt',
        'title',
        'body',
        'user_id',
        'category_id',
        'thumbnail'
    ];

    //eager loading by default
    //protected $with = ['category', 'author'];

    //this is another way to change the route binging field
    //public function getRouteKeyName() {
    //    return 'slug';
    //}

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //by default laravel uses the function name as the name of the table
    //so user will be user_id
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class)->orderByDesc('created_at');
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->where(fn($query)=>
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('body', 'like', '%' . request('search') . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category)=>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author)=>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );

    }


}
