<?php

namespace App\Http\Controllers\Admin;
use App\CentralLogics\Helpers;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductImages;
use App\Model\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Model\Cart;
use App\Model\User;
use App\Model\shipping_address;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function variant_combination(Request $request)
    {
        $options = [];
        $price = $request->price;
        $product_name = $request->name;

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $my_str = implode('', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }

        $result = [[]];
        foreach ($options as $property => $property_values) {
            $tmp = [];
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, [$property => $property_value]);
                }
            }
            $result = $tmp;
        }
        $combinations = $result;
        return response()->json([
            'view' => view('admin-views.product.partials._variant-combinations', compact('combinations', 'price', 'product_name'))->render(),
        ]);
    }

    public function get_categories(Request $request)
    {
        $cat = Category::where(['parent_id' => $request->parent_id])->get();
        $res = '<option value="' . 0 . '" disabled selected>---Select---</option>';
        foreach ($cat as $row) {
            if ($row->id == $request->sub_category) {
                $res .= '<option value="' . $row->id . '" selected >' . $row->name . '</option>';
            } else {
                $res .= '<option value="' . $row->id . '">' . $row->name . '</option>';
            }
        }
        return response()->json([
            'options' => $res,
        ]);
    }

    public function index()
    {
        $categories = Category::where(['position' => 0])->get();
        return view('admin-views.product.index', compact('categories'));
    }

    public function list()
    {
        $products = Product::latest()->paginate(10);
        return view('admin-views.product.list', compact('products'));
    }

    public function search(Request $request)
    {
        $key = explode(' ', $request['search']);
        $products = Product::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
            }
        })->get();
        return response()->json([
            'view' => view('admin-views.product.partials._table', compact('products'))->render()
        ]);
    }

    public function view($id)
    {
        $product = Product::where(['id' => $id])->first();
        $reviews = Review::where(['product_id' => $id])->latest()->paginate(20);
        return view('admin-views.product.view', compact('product', 'reviews'));
    }
    
  

 public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'category_id' => 'required',
             'images' => 'required',
             'sku' => 'required',
             'price' => 'required|numeric|min:1',
        ], [
            'name.required' => 'Product name is required!',
            'category_id.required' => 'category  is required!',
        ]);

        if ($request['discount_type'] == 'percent') {
            $dis = ($request['price'] / 100) * $request['discount'];
        } else {
            $dis = $request['discount'];
        }

        if ($request['price'] <= $dis) {
            $validator->getMessageBag()->add('unit_price', 'Discount can not be more or equal to the price!');
        }

        if ($request['price'] <= $dis || $validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $p = new Product;
        // $p->name = $request->name;

        $category = [];
        if ($request->category_id != null) {
                $category_id = $request->category_id;
        };

        $p->category_ids =$category_id;
        $p->name = $request->name;
        $p->slug = str_replace(' ','-',$request->name);
        $p->description = $request->description;
        $p->quantity = $request->quantity;
        $p->price = $request->price;
        $p->unit = $request->unit;
        $p->sku = $request->sku;
        $p->tax = $request->tax_type == 'amount' ? $request->tax : $request->tax;
        $p->tax_type = $request->tax_type;
        $p->discount = $request->discount_type == 'amount' ? $request->discount : $request->discount;
        $p->discount_type = $request->discount_type;
        $p->save();

// echo "<PRE>";
// print_r($p);
// exit;

        $product_id = $p->id;


            $file_extensions = array('png','jpg','jpeg');
            if($images=$request->file('images'))
            {
                foreach($images as $image)
                {
                    $destination_path = storage_path('product');
                    $file_name = rand(1111,9999).'-'.$image->getClientOriginalName();
                    if(in_array($image->getClientOriginalExtension(),$file_extensions))
                    {
                        $image->move($destination_path,$file_name);

                        $uploads_val = new ProductImages;
                        $uploads_val->images = $file_name;
                        $uploads_val->product_id = $product_id;

                        $uploads_val->save();

                    }
                }
            }
            else{
                echo "Error";
            }

        return response()->json([], 200);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $product_category = json_decode($product->category_ids);
        $categories = Category::where(['parent_id' => 0])->get();
        $images = Productimages::select('images','id')->where('product_id',$id)->get();
        return view('admin-views.product.edit', compact('product', 'product_category', 'categories','images'));
    }

    public function status(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();
        Toastr::success('Product status updated!');
        return back();
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric|min:1',
            'sku' => 'required',
        ], [
            'name.required' => 'Product name is required!',
            'category_id.required' => 'category  is required!',
        ]);

        if ($request['discount_type'] == 'percent') {
            $dis = ($request['price'] / 100) * $request['discount'];
        } else {
            $dis = $request['discount'];
        }

        if ($request['price'] <= $dis) {
            $validator->getMessageBag()->add('unit_price', 'Discount can not be more or equal to the price!');
        }

        if ($request['price'] <= $dis || $validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }
        $p = Product::find($id);
        // $p = new Product;
        $p->name = $request->name;
        $category = [];
        if ($request->category_id != null) {
                $category_id = $request->category_id;
        };


        $p->description = $request->description;

        $p->slug = str_replace(' ','-',$request->name);

        $p->price = $request->price;
        $p->quantity = $request->price;
        $p->unit = $request->unit;
        $p->sku = $request->sku;
        $p->tax = $request->tax_type == 'amount' ? $request->tax : $request->tax;
        $p->tax_type = $request->tax_type;

        $p->discount = $request->discount_type == 'amount' ? $request->discount : $request->discount;
        $p->discount_type = $request->discount_type;



        $p->save();

        $product_id = $p->id;

        $file_extensions = array('png','jpg','jpeg');
        if($images=$request->file('images'))
        {
            foreach($images as $image)
            {
                $destination_path = storage_path('product');
                $file_name = rand(1111,9999).'-'.$image->getClientOriginalName();
                if(in_array($image->getClientOriginalExtension(),$file_extensions))
                {
                    $image->move($destination_path,$file_name);
                    // $category = new Category;
                    $uploads_val = new ProductImages;
                    $uploads_val->images = $file_name;
                    $uploads_val->product_id = $product_id;

                    $uploads_val->save();

                }
            }
        }
        else{
            echo "Error";
        }
        Toastr::success('Products updated successfully!');
        return back();
        // return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = '0';
        $product->delete();
        Toastr::success('Product removed!');
        return back();
    }

    public function deletecart(Request $request)
    {
        $Cart = Cart::find($request->id);
        $Cart->delete();
        return Redirect::to('cart');

    }

    public function remove_image(Request $request, $imgid)

    {

        $imagePath = ProductImages::select('images')->where('id', $request->imgid)->first();
          $filePath = 'storage/product/'.$imagePath->images;

 if (file_exists($filePath)) {

                   unlink($filePath);

                   ProductImages::where('id', $request->imgid)->delete();

        }else{

            ProductImages::where('id', $imgid)->delete();
        }

        Toastr::success('Image removed!');
        return back();
    }

    public function productslugpage($name)
    
    {
        $post=Product::with('product_images','category')->where('slug',$name)->first();
        $categories=Category::all();
        $realated_products= Product::where('category_ids', '=', $post->category_ids)->where('id', '!=', $post->id)->where('status','1')->with('singleProductImage')->get()->toarray();
      
        //   echo "<PRE>";
        // print_r($post);
        // exit;
        return view('frontend.product-detail', compact('post', 'categories', 'realated_products'));


    }

    public function addToCart(Request $request)
    {
        $slug =  $request->slug;
        $products = Product::where('slug',$slug)->get()->toArray();
        $product_details = $products[0];
        $product_stock_quantity = $product_details['quantity'];
        $product_id = $product_details['id'];
        $product_price = $product_details['price'];
        $product_tax = $product_details['tax'];


        if($request->quantity <= $product_stock_quantity)
        {
            if(isset(Auth::user()->id))
            {
                $cart =  Cart::where([['product_id',$product_id],['user_id',Auth::user()->id]])->get();
                // dd($cart);
                $cart_count = count($cart);

                if($cart_count == 0)
                {
                    $cart_insert = new Cart;
                    $cart_insert->product_id = $product_id;
                    $cart_insert->price = $product_price;
                    $cart_insert->quantity = $request->quantity;
                    $cart_insert->total = $product_price;
                    $cart_insert->tax = $product_tax;
                    $cart_insert->user_id = Auth::user()->id;

                    $cart_insert->save();
                }else{
                    $cart_update = Cart::where([['product_id',$product_id],['user_id',Auth::user()->id]])->pluck('quantity')->first();
                    $update_qty = $cart_update+1;
                    Cart::where([['product_id',$product_id],['user_id',Auth::user()->id]])->update(['quantity'=>$update_qty]);
                }
            }
            else
            {
                if($request->hasCookie('ecom_prod'))
                {
                    $cookie_value = Cookie::get('ecom_prod');
                    $cart = Cart::where([['cookies_id',$cookie_value],['product_id',$product_id]])->get();
                    $cart_count = count($cart);
                    if($cart_count == 0)
                    {
                        $cart_insert = new Cart;
                        $cart_insert->product_id = $product_id;
                          $cart_insert->price = $product_price;
                        $cart_insert->quantity = $request->quantity;
                        $cart_insert->cookies_id = $cookie_value;
                            $cart_insert->tax = $product_tax;
                        $cart_insert->save();
                    }
                    else{
                        $cart_update = Cart::where([['cookies_id',$cookie_value],['product_id',$product_id]])->pluck('quantity')->first();

                        $update_qty = $cart_update+1;
                        Cart::where([['cookies_id',$cookie_value],['product_id',$product_id]])->update(['quantity'=>$update_qty]);
                    }
                }
                else
                {
                    $cart_cookie = date('d').date('m').'-'.rand(1000,9999).'-'.rand(10000,99999);
                    Cookie::queue('ecom_prod', $cart_cookie, 45000);
                    $cart = new Cart;
                    $cart->product_id = $product_details['id'];
                    $cart->quantity = $request->quantity;
                    $cart->cookies_id = $cart_cookie;
                    $cart->save();
                }

            }


            return response()->json(['status'=>'success',"msg"=>"Product Added Successfully"]);
            if(!isset(Auth::user()->id))
            {
                cookie::queue('redirectTo', 'cart', 45000);
                return redirect()->route('route.name', [$param]);
            }
        }
        else
        {
            return response()->json(['status'=>'error',"msg"=>"Product Not Available"]);
        }
    }

public function userorderlist(Request $request)
{
     if(isset(Auth::user()->id))
            {
               $user_id = Auth::user()->id;

               $cart = Cart::with('product','singleProductImage')->where('user_id', $user_id)->get()->toArray();

              return view('frontend.cart',compact('cart'));

                    return response()->json(['status'=>'failure'," user data  failure no product in cart "]);
                }

            else
            {
                if($request->hasCookie('ecom_prod'))
                {

                    $cookie_value = Cookie::get('ecom_prod');
                    $cart = Cart::with('product','singleProductImage')->where('cookies_id', $cookie_value)->get()->toArray();

                    return view('frontend.cart',compact('cart'));

                }
                else{
                    return response()->json(['status'=>'failure'," cookies failure no product in cart "]);

            }
        }
        return response()->json(['status'=>'failure',"no product in cart "]);

        }


 public function updatecartlist(Request $request)

        {

            if(isset(Auth::user()->user_id))
            {
                if($request->id && $request->quantity){

                    $cart = Product::all();

                    $cart[$request->id]["quantity"] = $request->quantity;

                    session()->put('carts', $cart);

                    return response()->json(['status'=>'success',"msg"=>"cart updated Successfully"]);

                }


            else{
                    echo "no user";
                }
            }
            else
            {
                if($request->hasCookie('ecom_prod'))
                {
                    if($request->id && $request->quantity){

                        $cart = session()->get('cart');

                        $cart[$request->id]["quantity"] = $request->quantity;

                        session()->put('cart', $cart);

                        session()->flash('success', 'Cart updated successfully');

                    }

                }
                else{
                    echo "no user found";

            }
        }

            return response()->json(['status'=>'faiure',"msg"=>"no user found"]);



        }
        public function deleletcart($id)
    {
        Cart::remove($id);
        return back()->with('success', 'product deleted succesfully' );
    }

    public function productlisting()
    {

        return view('frontend.productlisting');
    }

    public function productlistingcategory(Request $request)
    {
       // echo "Testing";exit;
        
        $search = request()->query('search');
        
        if(strlen($search)>0)
        {

         $product_display = Product::Where('name', 'like', '%' .$search. '%')->with('product','singleProductImage')->paginate(3);
   
        }
  
        else{
       $product_display = Product::with('product','singleProductImage')->paginate(3);
        }
        
        $categories=Category::all();
            // $categories=Category::select('name')->havingRaw('COUNT(*) > 1')->get();
        // $groups->count() > 1;
   
        // $post=Product::with('category','product_images')->get()->toarray();
       


        $post = Category ::select('name','id')->with('productone')->get()->toarray();
        
        //       echo "<PRE>";
        // print_r($post);
        // exit;
        
        return view('frontend.productlisting', compact('post','categories','product_display'));
        
        
    }
    
    
    
    public function billing()
    {
        
          if(isset(Auth::user()->id))
            {
              $user_id = Auth::user()->id;

              $user_details = User::select('*')->where('id',$user_id)->get()->toarray();
              $shipping = shipping_address::select('*')->where('user_id',$user_id)->get()->toarray();
            //   echo "<PRE>";
            //   print_r($shipping);
            //   exit;

                return view('frontend.address',compact('shipping'));

                    
                }

            else
            {
              return Redirect::to('register');
        }
       
        }

        
    // public function shipping_address(Request $request)
    // {
    //      if(isset(Auth::user()->id)){
    //      $user_id = Auth::user()->id;
    //      $shipping_address_find = shipping_address::all()->where('user_id',$user_id)->get();
    //      $shipping_address = shipping_address::where(["user_id"=>$shipping_address_find])->first();
    //      $shipping_address->first_name = $request->first_name;
    //     $shipping_address->last_name = $request->last_name;
    //     $shipping_address->shipping_address = $request->shipping_address;
    //     $shipping_address->city = $request->city;
    //     $shipping_address->state = $request->state;
    //     $shipping_address->country = $request->country;
    //     $shipping_address->zip_code = $request->zip_code;
    //     $shipping_address->phone_no = $request->phone_no;
    //      $shipping_address->save();
         
    //         }
        
    //     else{
            
            
    //     $shiping_address = new shipping_address;
    //     $shiping_address->user_id = Auth::user()->id;
    //     $shiping_address->first_name = $request->first_name;
    //     $shiping_address->last_name = $request->last_name;
    //     $shiping_address->shipping_address = $request->shipping_address;
    //     $shiping_address->city = $request->city;
    //     $shiping_address->state = $request->state;
    //     $shiping_address->country = $request->country;
    //     $shiping_address->zip_code = $request->zip_code;
    //     $shiping_address->save();
    //      return Redirect::to('address_checkout');
    //     }
 
    // }
 
  public function editshipping_address_form(Request $request)
    {
         $user_id = Auth::user()->id;
        $shipping_addressform = User::find($user_id);
        $shipping_addressform->f_name = $request->f_name;
        $shipping_addressform->l_name = $request->l_name;
        $shipping_addressform->address = $request->address;
        $shipping_addressform->city = $request->city;
        $shipping_addressform->state = $request->state;
        $shipping_addressform->country = $request->country;
        $shipping_addressform->zip_code = $request->zip_code;
        $shipping_addressform->phone = $request->phone;
         $shipping_addressform->save();
        }
 

 
   public function edit_billing(Request $request)
    { 
         
         if(isset(Auth::user()->id)){
         $user_id = Auth::user()->id;
         $shipping_address_find = shipping_address::select('id','user_id')->where('user_id',$user_id)->get()->toarray();
    
         if (count($shipping_address_find) > 0)
         {

         $shiping_address = shipping_address::find($shipping_address_find['id']);
         $shiping_address->first_name = $request->first_name;
        $shiping_address->last_name = $request->last_name;
        $shiping_address->shipping_address = $request->shipping_address;
        $shiping_address->city = $request->city;
        $shiping_address->state = $request->state;
        $shiping_address->country = $request->country;
        $shiping_address->zip_code = $request->zip_code;
        $shiping_address->phone = $request->phone;
         $shiping_address->save();  
                  
              }
        
          else{

        $shiping_address = new shipping_address;
        $shiping_address->user_id = Auth::user()->id;
        $shiping_address->first_name = $request->first_name;
        $shiping_address->last_name = $request->last_name;
        $shiping_address->shipping_address = $request->shipping_address;
        $shiping_address->city = $request->city;
        $shiping_address->state = $request->state;
        $shiping_address->country = $request->country;
        $shiping_address->phone = $request->phone;
        $shiping_address->zip_code = $request->zip_code;
        $shiping_address->save();
         return Redirect::to('address_checkout');
        }
            }
        
       
 
       
        }
 
    public function productfiltercategory(Request $request,$id)
    {
        
       
        
         
        
        // $data  = DB::table('products')->get();
        // foreach($data as $data)
        // {
        //     $name= $data->name; 
        //     $id= $data->id; 
        //     $slug = Str::slug($name, '-');
        //     $slug2 = $slug.'-'.$id;
            
        //   // $namm =  $slug.'-'.$aa;
        //     $update = DB::table('products')->where('id',$id)->update(['slug'=>$slug2]);
              
        // }
        
     //  echo "Testing";exit;
        $postfilter=Product::with('singleProductImage')->where('category_ids',$id)->get()->toarray();
        
        //   echo "<PRE>";
        //  print_r($postfilter);
        //  exit;
        
        $filterproduct ='';
        foreach($postfilter as $postfiltercategory)
        {
        $filterproduct .='<div class="col-sm-4 col-xs-12 item">
                  <div class="wrapper">
                    <div class="pro-img">
                      <img src="'.url("storage/product").'/'.$postfiltercategory["single_product_image"]["images"].'" alt="product" class="img-responsive" style="height:29%"/>
                    </div>
                    <div class="contain-wrapper">
                      <div class="tit">'.$postfiltercategory["name"].'</div>
                      <div class="price">
                        <div class="new-price">&#x20b9;'.$postfiltercategory["price"].'</div>

                      </div>
                      <div class="btn-part">  <a  href="'.route("product",$postfiltercategory["slug"]).'" class="cart-btn"> <i class="icon-basket-supermarket"></i>buy now</a>
                       
                      </div>
                    </div>
                    <div class="wrapper-box-hover">
                      <div class="text">
                        <ul>
                     <li><a href="'.route("product",$postfiltercategory["slug"]).'"><i class="icon-view"></i></a></li>

                        </ul>
                      </div>
                    </div>

                  </div>

                </div>';
        }
         
 return $filterproduct;
        
    }
    
     private function createSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {

            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
    
    

}
