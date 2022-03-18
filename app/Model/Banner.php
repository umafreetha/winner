<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    
        protected $table = 'banners';
    
     
    

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }
}
