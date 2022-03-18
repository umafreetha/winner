<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;



use Illuminate\Support\Facades\DB;

class ProductImages extends Model
{
    protected $table = 'product_images';
     protected $fillable = ['images','product_id'];

    public function newarrival()
    {
        return $this->hasone(Product::class,'id');
    }
 
}
