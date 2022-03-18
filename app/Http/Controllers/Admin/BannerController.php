<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductImages;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    function index()
    {
       
        $products = Product::orderBy('name')->get();
        $categories = Category::where(['parent_id'=>0])->orderBy('name')->get();
        return view('admin-views.banner.index', compact('products', 'categories'));
    }

    function list()
    {
        $banners=Banner::latest()->paginate();
        return view('admin-views.banner.list',compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ], [
            'title.required' => 'Title is required!',
        ]);

        $file_extensions = array('png','jpg','jpeg');
        if($file = $request->file('image'))
        {
            $destination_path = 'storage/banner/';
            $image_name = rand(1111,9999).'-'.$file->getClientOriginalName();

            if(in_array($file->getClientOriginalExtension(),$file_extensions))
            {
                $file->move($destination_path,$image_name);
            }
        }
        $banner = new Banner;
        $banner->title = $request->title;
        $banner->image = $image_name;
        $banner->save();
       Toastr::success('Banner added successfully!');
        return redirect('admin/banner/list');
    }

    public function edit($id)
    {

        $banner = Banner::find($id);
        return view('admin-views.banner.edit', compact('banner'));

    }

    public function status(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->status = $request->status;
        $banner->save();
        Toastr::success('Banner status updated!');
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Title is required!',
        ]);

        $file_extensions = array('png','jpg','jpeg');
        if($file = $request->file('image'))
        {
            $destination_path = 'storage/banner/';
            $image_name = rand(1111,9999).'-'.$file->getClientOriginalName();

            if(in_array($file->getClientOriginalExtension(),$file_extensions))
            {
                $file->move($destination_path,$image_name);
            }

        }
        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->image = $image_name;
        $banner->save();
        Toastr::success('Banner updated successfully!');
        return redirect('admin/banner/list');
    }

    public function delete(Request $request)
    {
        $banner = Banner::find($request->id);
        if (Storage::disk('public')->exists('banner/' . $banner['image'])) {
            Storage::disk('public')->delete('banner/' . $banner['image']);
        }
        $banner->delete();
        Toastr::success('Banner removed!');
        return back();
    }


    public function test(Request $request)
    {
          $test= DB::select("SELECT 
    products.id AS product_ID,
    products.name AS product_name,
    categories.name AS category_name,
    categories.tax AS category_tax,
    products.price AS product_price,
    products.discount AS product_discount,
    products.slug AS product_slug
     FROM
    categories
      JOIN
    products ON categories.id = products.category_ids
     AND products.name LIKE '%butter jhkljh%'");
     echo "<PRE>";
     print_r($test);
     exit;
          
    }

    public function viewbanner(Request $request)
    {
        //echo "test";exit;
        
        $banner = Banner::all()->where('status','1')->toarray();
        $category = Category::with('category')->get()->take(3)->toarray();
        $product = Product::with('product','singleProductImage' )->get()->take(6)->toarray();
        $product_category = Product::with('product','singleProductImage' )->get()->take(3)->toarray();
        $product_display = Product::with('product','singleProductImage' )->get()->toarray();
         $product_category = Product::with('product','singleProductImage' )->get()->take(3)->toarray();
        $newarreival = Product::with('product','singleProductImage' )->orderby('id','desc')->get()->take(3)->toarray();
        // $newarreival = Product::select('id','name')->get();
        // $product_images = ProductImages::select('images','product_id')->where('product_id', '=', $newarreival->id)->get()->toarray();
//  echo "<PRE>";
//   print_r($product_display);
//  exit;
        return view('frontend.index', compact('banner','category','product','product_display','newarreival','product_category'));
    }
}
