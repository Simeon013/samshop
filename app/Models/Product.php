<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot(){

        parent::boot();

        self::creating(function ($product) {
            $product->category()->associate(request()->category_id);
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
