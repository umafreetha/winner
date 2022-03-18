<?php
namespace App\Traits;
use Config;
use App\Model\Product;
use App\Model\Cart;
trait common

{
    public function crypt($string , $action ='e')
    {

        $secret_key = 'secret';
        $secret_iv = 'dates';
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256',$secret_key);
        $iv = substr(hash('sha256',$secret_iv),0,16);
        if($action == 'e')
            $output = base64_encode(openssl_encrypt($string,$encrypt_method,$key,0,$iv));
        else
            $output = openssl_decrypt(base64_decode($string),$encrypt_method,$key,0,$iv);

        return $output;
    }
    public function send_otp_func($mobile_number)
    {
        $api_key = env('TWO_FACTOR_API_KEY','9aff1e08-b7bb-11eb-8089-0200cd936042');
        $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
        $url = "https://2factor.in/API/V1/$api_key/SMS/$mobile_number/AUTOGEN";
        // print_r($url );
        // exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        $Response= curl_exec($ch);
        curl_close($ch);
        return $response_json=json_decode($Response,false);
    }

    public function verify_otp($session_id,$otp_input)
    {
        $api_key = env('TWO_FACTOR_API_KEY','9aff1e08-b7bb-11eb-8089-0200cd936042');
        $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
        $url = "https://2factor.in/API/V1/$api_key/SMS/VERIFY/$session_id/$otp_input";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        $Response= curl_exec($ch);
        curl_close($ch);
        return $response_json=json_decode($Response,false);
    }


    public function get_product_price($product_id,$quantity=1)
    {
        $product= Product::select('price','tax')->where('id',$product_id)->get()->toarray();
        $data['product_price']=$product[0]['price'];
        $data['product_tax']=$product[0]['tax'];
        $product_price_qty = $product[0]['price'] * $quantity;
        $product_price_percentage = $product_price_qty/100;
        $data['product_total_price'] = $product_price_qty + ($product_price_percentage * $product[0]['tax']);
        return $data;
    }


    public function get_cart_subtotal($column_name,$user_define)
    {
         $product_price = [];
        $user_products = Cart::select('product_id','quantity')->where($column_name,$user_define)->get()->toarray();
        
        foreach($user_products as $key => $values)
        {
           if(isset($values['product_id']) && isset($values['quantity']))
           {
                $product_details = $this->get_product_price($values['product_id'],$values['quantity']);
                $product_price[] = $product_details['product_total_price'];
           }
        }
        
        return $subtotal = array_sum($product_price);
    }


}
