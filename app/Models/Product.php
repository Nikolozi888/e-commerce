<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(fn ($query) => 
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            );
        });

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn($query) => 
            $query->where('slug', $category)
        ));
    
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
