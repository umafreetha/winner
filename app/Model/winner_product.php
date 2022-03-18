<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class winner_product extends Model
{
    protected $table = "winner_product";
    
     public function singleProductImage()
     {
         return $this->hasOne(ProductImages::class,'product_id');
     }
     public function product()
     {
         return $this->belongsTo(Product::class,'product_id');
     }

}
