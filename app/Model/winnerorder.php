<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class winnerorder extends Model
{
    protected $table = "winner_orders";

     public function orderid()
     {
        return $this->hasmany(winner_product::class,'order_id');
     }
     
     public function getUser()
     {
        return $this->belongsTo(User::class,'user_id');
     }
     
      public function getShippingAddress()
     {
        return $this->belongsTo(shipping_address::class,'shippingaddress_id');
     }
     
    
}
