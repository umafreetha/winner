<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $casts = [
        'parent_id' => 'integer',
        'position' => 'integer',
        'status' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

    public function childes()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
     public function productone()
    {
        return $this->hasMany(Product::class, 'category_ids');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
 
    public function productsMenubar()
    {
        return $this->hasMany(Product::class,'category_ids');
    }
    public function category() {
        return $this->belongsTo(Category::class); 
    }
}
