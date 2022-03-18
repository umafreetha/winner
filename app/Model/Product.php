<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
   protected $table = 'products';
    protected $fillable = ['name','description','price','unit','category_ids','slug'];
    protected $casts = [
        'tax' => 'float',
        'price' => 'float',
        'status' => 'integer',
        'discount' => 'float',
        'set_menu' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'wishlist_count' => 'integer',
        'slug' => 'varchar',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class)->latest();
    }

    public function rating()
    {
        return $this->hasMany(Review::class)
            ->select(DB::raw('avg(rating) average, product_id'))
            ->groupBy('product_id');
    }
     public function product_images()
     {
         return $this->hasMany(ProductImages::class,'product_id');
     }
     public function singleProductImage()
     {
         return $this->hasOne(ProductImages::class,'product_id');
     }

     public function category()
     {
        return $this->belongsTo(Category::class,'category_ids');
     }
     public function posts(){
        return $this->hasMany('App\Model\Product');
    }

    public function categorys(){
        return $this->belongsTo('App\Model\Category');
    }
    public function product() {
        return $this->belongsTo(product::class);
    }

}

