<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Model\Cart;
use SweetAlert;
use App\Model\winnerorder;
use App\Model\orders_initiate;
use App\Model\winnerproduct_initiate;
use App\Model\winner_product;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Mail\OrderEmail;
use Illuminate\Support\Facades\Mail;
use Config;

class RazorpayPaymentController extends Controller
{

    public function index()
    {
   
        return view('frontend.razor');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $api = new Api(config('app.RAZORPAY_KEY'), config('app.RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);
       $pamt=$payment->amount;
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=> $pamt));
//   echo"<PRE>";
//   print_r($response);
//   exit;
   
           } catch (Exception $e) {
                return  $e->getMessage();
                session()->put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        else{
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=> $pamt));
  echo"<PRE>";
  print_r($response);
  exit;
   
           }
           catch (Exception $e) {
                return  $e->getMessage();
                session()->put('error',$e->getMessage());
                return redirect()->back();
            }
            
        }

    
        $updateorder_initiate  = orders_initiate::where(['tax_id'=>$response->description])->update(["payment_id" => $input['razorpay_payment_id']]);

        $order_initiate_id = orders_initiate ::where('tax_id',$response->description)->get()->toArray();
        // $order_initiate_id = orders_initiate::all();
        
      
      
        $prefix = "WN";
        $id = IdGenerator::generate(['table' => 'winner_orders_initiate', 'length' => 6, 'field' => 'order_id',
        'prefix' =>$prefix]);       
        $order_insert = new winnerorder;
        $order_insert->order_id = $id;
        $order_insert->user_id = Auth::user()->id;
        $order_insert->shippingaddress_id = $order_initiate_id[0]['shippingaddress_id'];  
        $order_insert->payment_id = $order_initiate_id[0]['payment_id'];
        $order_insert->tax_id = $order_initiate_id[0]['tax_id'];
        $order_insert->total = $order_initiate_id[0]['total'];
        $order_insert->status = 'success';
        
        $order_insert->save();
         if(strtolower($response->status) == strtolower('captured')){
            
            $order_status = winnerorder::where('user_id',Auth::user()->id)->update(["status"=>"confirmed"]);
        }
        else{
            $order_status = winnerorder::where('user_id',Auth::user()->id)->update(["status"=>$response->status]);
        }

        $order_insert_last_id = $order_insert->id; 
        
            // print_r($order_initiate_id);
           
        $order_product = winnerproduct_initiate::where('order_id',$order_initiate_id[0]['id'])->get()->toarray();
        
    //   print_r($order_product);
     foreach ( $order_product as $order_product_final)
     {
         $final_product= new winner_product;
         $final_product->order_id = $order_insert->id;
         $final_product->product_id = $order_product_final['product_id'];
         $final_product->quantity = $order_product_final['quantity'];
         $final_product->product_total = $order_product_final['product_total'];
         $final_product->gst = $order_product_final['gst'];
         $final_product->save();  
         
     }
        return redirect('orderlist')->with('alert', 'payment succesfull!');
    }
    
    public function chkMail(Request $request)
    {
         Mail::send('email-templates.orders',[],
                function ($message)
                {
                    $message->from(Config::get('mail.from.address'), Config::get('mail.from.name'));
                    $message->to('hariprasath.p@seyasoftech.com')->subject('Orders');
                    
                });
    }
    
   
}
