<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Model\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Traits\common;
use Session;
use App\Model\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
class RegisterController extends Controller
{
    use RegistersUsers,common;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

/**
 * Create a new authentication controller instance.
 *
 * @return void
 */
        protected function validator(Request $request)
        {
            $otp_phone = $request['phone'];
            $request->validate([
                'f_name' =>['required'],
                'l_name' =>['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required','max:10','min:10','unique:users'],
                'password' => ['required', 'min:8']
            ]);

        }

        public function send_otp(Request $request)
        {
            $otp_phone = $request['phone'];
            if(strlen($request->phone)!=10)
            {
                $error['phone'] = ["The mobile number should have 10 digits"];
                $response['error'] = $error;
                return response()->json($response,422);
            }
            // $request['phone'] = $this->crypt($request['phone'],'e');
             $request['phone'] = $request['phone'];

            $request->validate([
                'f_name' =>['required'],
                'l_name' =>['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required','unique:users'],
                'password' => ['required', 'min:8']
            ]);
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

        public function resend_otp(Request $request)
        {
            // echo "testdevi";
            // exit;
            $request->validate([
                'user_number' => ['required','max:10']
            ]);
            $otp_phone = $request['phone'];
            $request['phone'] = $this->crypt($request['phone'],'e');
             $request->validate([
                 'phone' => ['required', 'unique:users']
             ]);

            $api_key = "b49319ef-025f-11eb-9fa5-0200cd936042";
            $otp_data = $this->send_otp_func($api_key,$request->user_number);
            if($otp_data->Status=="Success")
            {
                $response['status'] = $otp_data->Status;
                $response['details'] = $otp_data->Details;
                return $response;
            }
            else{
                $response['message']= "The given data has invalid";
                $error['status'] = $otp_data->Status;
               // $error['details'] = $otp_data->Details;
                $error['details'] = "Inalid OTP";
                $response['error'] = $error;
                return response()->json($response,422);
            }
        }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function store(Request $request)
    {
        $otp_data = $this->verify_otp($request['session_id'],$request['otp']);

        if($otp_data->Status=="Success")
        {
            /**validation start */
            $request->validate([
            'f_name' =>['required'],
            'l_name' =>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','max:10'],
            'password' => ['required', 'min:8']
            ]);
            // $request['phone'] = $this->crypt($request['phone'],'e');
              $request['phone'] = $request['phone'];

            $request->validate([
                'phone' => ['required', 'unique:users']
            ]);

            /**validation_end */
             $user  = User::create([
                'f_name' => $request['f_name'],
                'l_name' => $request['l_name'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'is_phone_verified' =>1,
                'password' => Hash::make($request['password']),
                 'status' => 1
            ]);
                
             return response()->json(['status' => 'sucess']);  

              
              $check_cookies = $user->id;

              $cookie_value = Cookie::get('ecom_prod');
               $user_update = Cart::where('cookies_id',$cookie_value)->update(['user_id'=>$check_cookies]);

               $del_cookie_user = Cart::where(['user_id' =>$check_cookies])->update(['cookies_id'=>NULL]);

             
                return response()->json(['status' => 'sucess']);  
             
            
        }
       
        else {
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
        return Redirect::to('/');

        }



}
