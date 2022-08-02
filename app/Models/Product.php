<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'category_id',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function getProducts(string $search = null)
    {
        $products = $this->where(function ($query) use ($search)
        {
            if($search){
                $query->where('name', 'LIKE', "%{$search}%");
                $query->orWhere('category', 'LIKE', "%{$search}%");
            }
        })->paginate(5);

        return $products;
    }
}
