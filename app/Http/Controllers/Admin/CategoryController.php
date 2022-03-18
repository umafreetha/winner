<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

//Murugan

use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
//Murugan

use App\Model\ProductImages;
class CategoryController extends Controller
{
    function index()
    {
          $failures = 0;
        $categories=Category::where(['position'=>0])->latest()->paginate(10);
        return view('admin-views.category.index',compact('categories','failures'));
    }

    function sub_index()
    {
        $categories=Category::with(['parent'])->where(['position'=>1])->latest()->paginate(10);
        return view('admin-views.category.sub-index',compact('categories'));
    }
    
    
    
    //Murugan
    
    public function fileimport(Request $request) 
    {
       // echo "Test";exit;


       $validator = Validator::make($request->all(),[
        'file' => 'required|max:50000'
    ]);

      if($validator->passes()){

        try {

          


                $cate_id  =$request->cate_id;
                function  __construct($cate_id)
                {
                $cate_id  =$request->cate_id;
                $this->cate_id= $cate_id;
                }
        
          

          //  Excel::import(new ProductImport, $request->file('file')->store('temp'));
          //echo "Murugan33";exit;
            Excel::import(new ProductImport($cate_id),  $request->file('file')->store('temp'));
            return back()->with('info', 'Products Uploaded Successfully!');
            }
            catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failures = $e->failures();


           //  $failures = 0;
            //  echo "dfsfsdf";exit;
              $categories=Category::where(['position'=>0])->latest()->paginate(10);
              return view('admin-views.category.index',compact('categories','failures'));

        
           // return view('admin.category.bulk', $data);
     
    }
    }


      
      //  return back();
    }
    
    //Murugan
    
    

    public function search(Request $request){
        $key = explode(' ', $request['search']);
        $categories=Category::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
            }
        })->get();
        return response()->json([
            'view'=>view('admin-views.category.partials._table',compact('categories'))->render()
        ]);
    }

    function sub_sub_index()
    {
        return view('admin-views.category.sub-sub-index');
    }

    function sub_category_index()
    {
        return view('admin-views.category.index');
    }

    function sub_sub_category_index()
    {
        return view('admin-views.category.index');
    }

    function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
    ], [
        'name.required' => 'Name is required!',
    ]);

        $file_extensions = array('png','jpg','jpeg');
        if($file = $request->file('image'))
        {
            $destination_path = 'storage/category/';
            $image_name = rand(1111,9999).'-'.$file->getClientOriginalName();

            if(in_array($file->getClientOriginalExtension(),$file_extensions))
            {
                $file->move($destination_path,$image_name);
            }
        }
        $category = new Category;
        $category->name = $request->name;
        $category->image = $image_name;
        $category->tax = $request->tax_type == 'amount' ? $request->tax : $request->tax;
        $category->tax_type = $request->tax_type;
        $category->parent_id = $request->parent_id == null ? 0 : $request->parent_id;
        $category->position = $request->position;
        // echo "<pre>";
        // print_r($category);
        // exit;
        $category->save();
        Toastr::success('category inserted successfully!');
        return back();
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin-views.category.edit',compact('categories'));


    }

    public function status(Request $request)
    {
        $category = Category::find($request->id);
        $category->status = $request->status;
        $category->save();
        Toastr::success('Category status updated!');
        return back();
    }

    public function update(Request $request, $id)
{

            $request->validate([
                'name' => 'required',
            ], [
                'name.required' => 'Name is required!',
            ]);

                $file_extensions = array('png','jpg','jpeg');
                if($file = $request->file('image'))
                {
                    $destination_path = 'storage/category/';
                    $image_name = rand(1111,9999).'-'.$file->getClientOriginalName();

                    if(in_array($file->getClientOriginalExtension(),$file_extensions))
                    {
                        $file->move($destination_path,$image_name);
                    }

                }
                else{

                    $image_name = $request->old_image;
                    // echo"<PRE>";
                    // print_r($image_name);
                    // exit;

                 }

                $category = Category::find($id);
                $category->name = $request->name;
                $category->image = $image_name;
                $category->parent_id = $request->parent_id == null ? 0 : $request->parent_id;
                $category->position = $request->position;
                 $category->save();
                Toastr::success('category inserted successfully!');
                return back();
            }



    public function delete(Request $request)
    {
        $category = category::find($request->id);
        if ($category->childes->count()==0){
            $category->delete();
            Toastr::success('Category removed!');
        }else{
            Toastr::warning('Remove subcategories first!');
        }
        return back();
    }






}
