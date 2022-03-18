<?php


namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\common;
use App\Model\Cart;
use App\Model\Product;
use App\Model\shipping_address;
use Session;
use Illuminate\Support\Facades\Redirect;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class CartController extends Controller

{
    use common;

    protected function validator(Request $request)
    {
        $otp_phone = $request['phone'];
        $request['phone'] = $this->crypt($request['phone'],'e');
        $request->validate([
            'phone' => ['required','max:10','min:10','unique:users'],
        ]);

    }
    public function index(Request $request)
    {
       
        if(isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
            $column_name="user_id";
        }
        else{
            $user_id = Cookie::get('ecom_prod');
            $column_name="cookies_id";
        }

        $cart = Cart::with('products.singleProductImage')->where($column_name, $user_id)->get()->toArray();
         $cart_products = []; 
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
        
        
        return view('frontend.cart',$response);
    }

      public function final_checkout(Request $request)
    {
      
        if(isset(Auth::user()->id))
        {
            $user_id = Auth::user()->id;
              $user_details = User::select('*')->where('id',$user_id)->get()->toarray();
              $shipping = shipping_address::select('*')->where('user_id',$user_id)->get()->toarray();
               $shiiping_address = shipping_address::select('id')->where('user_id',$user_id)->get()->toArray();
               $shipping_address_id =$shiiping_address[0]['id'];
            $column_name="user_id";
        }
        else{
            $user_id = Cookie::get('ecom_prod');
            $column_name="cookies_id";
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
        $response['shippingaddress_id'] = $shipping_address_id;
        $response['txn_id'] = rand(2, 99999);
        return view('frontend.final_checkout',$response,compact('user_details','shipping','shipping_address_id'));
    
    }



    public function updatecart(Request $request)
    {

        $cart = Cart::where('id',$request->id)->update(['quantity' => $request->quantity]);
        $cart_product  = Cart::select('product_id')->where('id',$request->id)->get();
        $product_details = $this->get_product_price($cart_product[0]->product_id,$request->quantity,$request->cart_id );
        $data['product_price'] = $product_details['product_price'];
        $data['gst'] =  $product_details['product_tax'];
        $data['product_total_price'] =  $product_details['product_total_price'];

        if(isset(Auth::user()->id))
        {
            $cart_or_cookie_id = Auth::user()->id;
            $column_name="user_id";
        }
        elseif($request->hasCookie('ecom_prod'))
        {
            $cart_or_cookie_id = Cookie::get('ecom_prod');
            $column_name="cookies_id";
        }

        //  $column_name.' '.$cart_or_cookie_id;
        $data['subtotal'] = $this->get_cart_subtotal($column_name ,$cart_or_cookie_id);

        return $data;
    }



    public function send_otp(Request $request)
    {
        $user_id = Auth::user()->id;
        $otp_phone = $this->crypt($request['phone']);

        $otp_verify = User:: select('phone')->where('id', $user_id)->get();

        if($otp_phone('phone') == $otp_verify('phone'))
        {

            $otp_data = $this->send_otp_func($otp_phone);
           if($otp_data->Status=="Success")
        {
            $response['status'] = $otp_data->Status;
            $response['details'] = $otp_data->Details;
            $response['register_step'] = "first";

            return $response;
        }
        else{
            $response['message']= "The given data has invalid";
            $error['status'] = $otp_data->Status;
          // $error['details'] = $otp_data->Details;
            $error['details'] = "Invalid OTP";
            $response['error'] = $error;
            $response['register_step'] = "first";
            return response()->json($response,422);
        }
        }
    else{
         $response['message']= "The given phone number data has invalid";
}
    }

    protected function store(Request $request)
    {
        $otp_data = $this->verify_otp($request['session_id'],$request['otp']);

        if($otp_data->Status=="Success")
        {            /**validation start */
            $request->validate([

            'phone' => ['required','max:10'],
            'password' => ['required', 'min:8']
            ]);
            $request['phone'] = $this->crypt($request['phone'],'e');
            $request->validate([
                'phone' => ['required', 'unique:users']
            ]);


            /**validation_end */
             $user_id = Auth::user()->id;
             $user  = User::where('id',$user_id)->select('passwor')->update(['phone'=>$request]);

            Auth::login($user);
            if (Auth::user()){
                return Redirect::to('userlogin');
            }

        }
        else{
            $response['message']= "The given data has invalid";
            $error['otp_status'] = $otp_data->Status;
            $error['otp_resp_details'] = $otp_data->Details;
            $error['otp_resp_details'] = "Invalid otp";
            $response['error'] = $error;
            return response()->json($response,422);
        }
    }

    public function getLogout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('userlogin');

        }


// public function forgetpassword(Request $request){

// return view('frontend.forgetpassword');
// }




public function forgetpassword(Request $request){

    $data =[
        'status' => 0
    ];

return view('frontend.forgetpassword',$data);
}

public function forgetpassword_check(Request $request)
{
   $phone = $request->phone;
   $data_count  = User::where('phone',$phone)->count();
   if($data_count == 0)
   {
    $response['status_code']= 0;
    return response()->json($response);
   }
   else
    {
        $find_one  = User::where('phone',$phone)->first();
        $idd = $find_one->id;
        $mobile_number = $phone;

        $otp_data = $this->send_otp_func($mobile_number);
        if($otp_data->Status=="Success")
        {
            $details = $otp_data->Details;
            $detailsarray =[
                'idd' => $idd,
                'status' => 1,
                'details' =>$details,
                'mobile' =>$phone
            ];
         Session::put('detailsarray',$detailsarray);
         $response['status_code']= 3;
         return response()->json($response);


        }
        else{
                $response['status_code']= 2;
                return response()->json($response);
        }

    }

}
public function forgetpassword2(Request $request)
{
   $user = Session::get('detailsarray');
   if($user!=0)
   {
        $details = $user['details'];
        $mobile = $user['mobile'];
        $idd = $user['idd'];
        $data =[
            'idd' => $idd,
            'status' => 1,
            'details' =>$details,
            'mobile' =>$mobile
        ];
        return view('frontend.forgetpassword',$data);
   }
   else
    {
        return redirect()->route('forgetpassword');
    }
     
}


public function update_details(Request $request)
{
    $otp_data = $this->verify_otp($request['details'],$request['otp']);
   // print_r($otp_data);exit;
    if($otp_data->Status=="Success")
    { 
        $password = Hash::make($request->password);
        $phone = $request->phone;
        $user_id = $request->user_id;

        $update = User::where('id',$user_id)->update(['password'=>$password]);
        Session::flush();
        $response['status_code']= 10;
        return response()->json($response);
    }
    else
        {
            $response['status_code']= 11;
            return response()->json($response);
        }
}


public function resent_otp(Request $request)
{
    $user = Session::get('detailsarray');
    if($user!=0)
    {
         $details = $user['details'];
         $mobile_number = $user['mobile'];
         $idd = $user['idd'];
        //  $data =[
        //      'idd' => $idd,
        //      'status' => 1,
        //      'details' =>$details,
        //      'mobile' =>$mobile
        //  ];

        $otp_data = $this->send_otp_func($mobile_number);
        if($otp_data->Status=="Success")
        {
            $details = $otp_data->Details;
            $detailsarray =[
                'idd' => $idd,
                'status' => 1,
                'details' =>$details,
                'mobile' =>$mobile_number
            ];
         Session::put('detailsarray',$detailsarray);
         
        //  $response['status_code']= 3;
        //  return response()->json($response);
        return redirect()->route('forgetpassword2');


        }
        else{
                $response['status_code']= 2;
                return response()->json($response);
        }



        // return view('frontend.forgetpassword',$data);
    }
    else
     {
         return redirect()->route('forgetpassword');
     }

}





}
