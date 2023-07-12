<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'excerpt',
        'title',
        'body'
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

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')
        );

        $query->when($filters['category'] ?? false, fn($query, $category)=>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );

    }


}
