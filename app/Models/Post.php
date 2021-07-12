<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['user_id','category_id','title','excerpt','body'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query,$search) => 
        $query->where(fn($query) =>
        $query->where('title','like','%'.$search.'%')
        ->orWhere('body','like','%'.$search.'%')));

        $query->when($filters['category'] ?? false, fn($query,$category) =>
            $query->whereHas('category', fn($query) => 
                $query->where('name',$category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query,$author) => 
            $query->whereHas('user', fn($query) => 
                $query->where('name',$author)
            )
        );
    }
}
