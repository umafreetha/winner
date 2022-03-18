<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Cart;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use SebastianBergmann\Type\NullType;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

     public function userLogin(Request $request)
     {
        return view('auth.userlogin');
     }



    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'],'password'=>$input['password'])))
        {

            if($request->hasCookie('ecom_prod'))
            {
                //  echo Auth::user()->id;
                //  exit;
                $cart_cookie = Cookie::get('ecom_prod');
                $cart_userupdate = Auth::user()->id;
                $user_update = Cart::where('cookies_id',$cart_cookie)->update(['user_id'=>Auth::user()->id]);

               $del_cookie_user = Cart::where(['user_id' =>Auth::user()->id])->update(['cookies_id'=>NULL]);

            //    echo "<PRE>";
            //    print_r($del_cookie_user);
            //    exit;

            }
            return redirect('/');

        }
        else{
            return Redirect::back()->withErrors(
                [
                    'email' => 'email or password  is incorrect',

                ]
            );
        }
    }


        public function comments(Request $request)
        {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $comments = $request->input('comments');
        $data=array('name'=>$name,"email"=>$email,"phone"=>$phone,"comments"=>$comments);
        DB::table('user_register')->insert($data);

        return Redirect::route('index');

        }





}
