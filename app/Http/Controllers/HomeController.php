<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Model\Banner;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductImages;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // return view('backend.home');
        return view('frontend.index');
    }
    public function frontendindex()

    {
        return view('frontend.index');
    }
    
     public function billing()

    {
        return view('frontend.address');
    }
    public function myaccount()
    {
        return view('frontend.myaccount');
    }
 public function emptycart()
    {
        return view('frontend.emptycart');
    }
    public function register()
    {
        return view('frontend.userregister');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }

    public function edit($id)
    {

        $product = Product::find($id);

        $product_category = json_decode($product->category_ids);

        $categories = Category::where(['parent_id' => 0])->get();
        $images = Productimages::select('images','id')->where('product_id',$id)->get();


        return view('admin-views.product.edit', compact('product', 'product_category', 'categories','images'));
    }

    public function categorynavbar(Request $request)
    {
        $posts = category::with('category')->get();
        return view('frontend.index',$posts);
    }
    
  public function viewbanner(Request $request)
    {
       // echo "Test";exit;
        
        $banner = Banner::all()->take(3)->toarray();
        $category = Category::with('category')->get()->take(3)->toarray();
        $product = Product::with('product','singleProductImage' )->get()->take(6)->toarray();
          $product_category = Product::with('product','singleProductImage' )->get()->take(3)->toarray();
        $product_display = Product::with('product','singleProductImage' )->get()->toarray();
        $newarreival = Product::with('product','singleProductImage' )->orderby('id','desc')->get()->toarray();
        // $newarreival = Product::select('id','name')->get();
        // $product_images = ProductImages::select('images','product_id')->where('product_id', '=', $newarreival->id)->get()->toarray();

        return view('frontend.index', compact('banner','category','product','product_display','newarreival','product_category'));
    }
}
