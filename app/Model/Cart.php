<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $table = "carts";
    protected $primaryKey = 'id';
    protected $fillable = ['cookies_id','product_id','quantity','user_id'];
    // public function products()
    // {
    //     return $this->belongsTo('App\Model\Product','id');
    // }
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function singleProductImage()
    {
        return $this->hasOne(ProductImages::class,'product_id');
    }


}
