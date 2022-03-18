<?php
namespace App\Imports;
use App\Model\Product;
use App\Model\ProductImages;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Validator;
use DB;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

use Illuminate\Support\Str;



//echo "Testing";exit;
class ProductImport implements ToModel, WithHeadingRow , WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $cate_id;

    function __construct($cate_id) 
    {
        $this->cate_id = $cate_id;
    }


   


    

    public function model(array $row)
    {

        $image = $row['image']; 

       // echo $image;exit;

            $count  = Product::count();
            if($count!=0 || $count!='')
            {
                $last_id1= Product::whereRaw('id = (select max(`id`) from products)')->get();
                $last_id = $last_id1[0]->id + 1;
            }
            else
                {
                    $last_id = 1;
                }

                DB::table('product_images')->insert([
                    ['product_id' => $last_id, 'images' => $image,'created_at'=>now(),'updated_at'=>now()]
                  ]);




      //  echo "Murugan22";exit;
         $cate_idd =  $this->cate_id; 
         $product_name = $row['product_name']; 
         $description = $row['description']; 
         $price = $row['price']; 
         $uom = $row['uom']; 
         $slug = Str::slug($product_name, '-');
         $slug2 = $slug.'-'.$last_id;

        
        return new Product([
            'name'     => $product_name,
            'description'    => $description,
            'price'    => $price,
            'unit'    => $uom,
            'category_ids'  =>$cate_idd,
            'slug' =>$slug2
            
        ]);
      // echo  $name = $row['name']; exit;
    }


    
    public function  rules(): array {
        return [
            // '*.product_name' =>  'required|max:250',
           ];
    }







}