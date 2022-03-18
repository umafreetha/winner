<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Model\checkout;
use Illuminate\Http\Request;
use App\Traits\common;
use App\Model\Cart;
use App\Model\winnerproduct_initiate;
use App\Model\Product;
use App\Model\orders_initiate;
use App\Model\winner_product;
use App\Model\order_payment;
use App\Model\shipping_address;
use App\Model\winnerorder;
use App\Model\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Session;
use Illuminate\Support\Facades\Redirect;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class checkoutController extends Controller
{
    use common;
    public function product_checkout(Request $request)
    {
        if(isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
              $user_details = User::select('*')->where('id',$user_id)->get()->toarray();
              $shipping = shipping_address::select('*')->where('user_id',$user_id)->get()->toarray();
            $column_name="user_id";
        }
        else{
            
            // $user_id = Cookie::get('ecom_prod');
            // $column_name="cookies_id";
            return Redirect::to('register')->with('jsAlert',  'IT WORKS!');
        }
        $cart = Cart::with('products.singleProductImage')->where($column_name, $user_id)->get()->toArray();

        foreach($cart as $key => $values)
        {
            $product_details = $this->get_product_price($values['product_id'],$values['quantity'],$values['id']);
            $data['cart_id'] = $values['id'];
            $data['product_id'] = $values['product_id'];
            $data['product_name'] = $values['products']['name'];
            $data['product_image'] = $values['products']['single_product_image']['images'];
            $data['product_price'] = $product_details['product_price'];
            $data['quantity'] = $values['quantity'];
            $data['gst'] =  $product_details['product_tax'];
            $data['product_total_price'] =  $product_details['product_total_price'];
            $cart_products[] = $data;
        }
        $response['cart_val'] = $cart_products;
        $subtotal = $this->get_cart_subtotal($column_name ,$user_id);
        $response['subtotal'] = $subtotal;
        
        $response['txn_id'] = rand(2, 99999);
        return view('frontend.address',$response,compact('user_details','shipping'));
    }

     public function product_checkout_user_deatils(Request $request)
     {

        if(isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $data_productid['cart'] = Cart::where('user_id', $user_id)->get()->toArray();
            $data_total['cart_subtotal'] = Cart::where('user_id', $user_id)->sum("total");
           
        }
        elseif($request->hasCookie('ecom_prod')!= "")
        {
            $cart_cookie = Cookie::get('ecom_prod');
            $data_productid['cart'] = Cart::where('cookies_id', $cart_cookie)->get()->toArray();
            $data_total['cart_subtotal'] = Cart::where('cookies_id', $cart_cookie)->sum('total');
        }
        // $this->autoIncrement('orders_initiate');
        $prefix = "WN";
        $id = IdGenerator::generate(['table' => 'winner_orders_initiate', 'length' => 6, 'field' => 'order_id',
        'prefix' =>$prefix]);
        $data = new orders_initiate; //change the model name `orders_initiate`
        // $product_price =$this->get_product_price();
        $data->order_id = $id;
        $data->status = 'pending';
        if(isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $column_name="user_id";
        }
        else{
            $user_id = Cookie::get('ecom_prod');
            $column_name="cookies_id";
        }
         
         $data->user_id = Auth::user()->id;
         $subtotal = $this->get_cart_subtotal($column_name ,$user_id);
          $data['total'] = $subtotal;
         $data->tax_id = $request->input('txn_id');
         $data->shippingaddress_id = $request->input('shippingaddress_id'); 
         $data->save();
        //insert products for orders_product_initiate

            $cart = cart::where('user_id',Auth::user()->id)->get()->toArray();
        foreach($cart as $values)
        {
            $product_price =$this->get_product_price($values['product_id'],$values['quantity']);
            $orderProducts=new winnerproduct_initiate;
            $orderProducts->quantity = $values['quantity'];
            $orderProducts->product_total = $product_price['product_total_price'];
            $orderProducts->order_id = $data->id;
            $orderProducts->product_id= $values['product_id'];
            $orderProducts->gst= $product_price['product_tax'];
            $orderProducts->save();

        }


        return Redirect::to('payment');
    }



     public function  orderlist(Request $request) 
     {
        // echo "sdfsdf";exit;
         $user_id = Auth::user()->id;
         $order_id = winnerorder::with('orderid.product.singleProductImage')->where('user_id',$user_id)->get()->toarray();
        //  echo "<PRE>";
        //  print_r($order_id);
        //  exit;
        
           return view('frontend.orderlist',compact('order_id'));
    
}

       public function  ordersummary(Request $request) 
     {
        
           return view('frontend.ordersummary');
    
}

}
