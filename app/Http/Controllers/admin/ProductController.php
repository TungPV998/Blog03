<?php

namespace App\Http\Controllers\admin;
use App\Model\Attribute;
use App\Model\AttrProduct;
use Illuminate\Database\Eloquent\Collection;
use App\components\RecursiveMenu;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmimProductRequest;
use App\Model\Categories;
use App\Model\Product;
use App\Model\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\TraitUploadFile\UploadFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB ;
class ProductController extends Controller

{
use UploadFile;


    private $product;

    public function __contructor(Product $product){

        $this->product = $product;

    }
    public function index()
    {
        $data = Product::with("category")->latest()->paginate(8);
        return view("admin.products.index",compact('data'));
    }

    public function create()
    {
        $attribute = Attribute::all();
        $dataMenu = Categories::all();
        $menu = new RecursiveMenu($dataMenu);
        $htmlOption = $menu->recursiveMenu($parentId='');
        return view("admin.products.create",compact('htmlOption','attribute'));
    }

    public function store(AdmimProductRequest $request){
    try{
        DB::beginTransaction();

        $data = [
            'pro_name' => $request->pro_name,
            'pro_slug' => Str::slug($request->pro_name),
            'unit_price' => $request->unit_price,
            'discount' => $request->discount,
            'quatity' => $request->quatity,
            'pro_description' => $request->pro_description,
            'pro_content' => $request->pro_content,
            'category_id' => $request->category_id,
            'active' => $request->active,
        ];
        //dd($data['pro_content']);
        $discount = (100 - (0))/100;
        $sale_price = ($discount * $request->unit_price);
        //echo $sale_price." -- ";
        $data['sale_price'] = $sale_price;
        $imgFirst = $this->storageTraitUpalod($request,'pro_img',"product");
        if(!empty($imgFirst)){
            $data['pro_img'] = $imgFirst['pro_img'];
            $data['path_img'] = $imgFirst['path_img'];
        }
       //var_dump($data);
        $idProduct =  Product::insertGetId($data);
        $attr_pro = $request->attr_pro;
        if(isset($attr_pro)){
            $data = [];
            foreach ($attr_pro as $value){
                foreach ($attr_pro as $value){
                    $item = [
                        'attr_id' => $value,
                        'product_id' => $idProduct
                    ];
                    array_push($data,$item);
                }
            }
            if(!empty($data)){
                \DB::table("attr_product")->where("product_id",$idProduct)->delete();
                \DB::table("attr_product")->insert($data);
            }

        }
        //dd($productNew);
//dd($productNew);
        if($request->hasFile('pro_multi_img')){
            foreach ($request->pro_multi_img as $item){
                $dataMultiImg = $this->storageTraitUpalodMultiFile($item,'product');
                ProductImage::create([
                    "products_id" => $idProduct,
                    "path_img" => $dataMultiImg['path_img'],
                    "pro_img_name" =>$dataMultiImg['pro_img_name'],
                ]);
            }
        }

        DB::commit();

        return redirect()->route("products.index");
    }catch (\Exception $exception){
        DB::rollBack();
   \Log::error('Message:'.$exception->getMessage().'Line: '.$exception->getLine());
    }
}

    public function edit($id)
    {
        $attribute = Attribute::all();
        $product = Product::with('productImage')->where("id",$id)->first();
        $attributeOld = AttrProduct::where("product_id",$id)->pluck("attr_id")->toArray();
        if(!$attributeOld) $attributeOld = [];
        //dd($attribute);
        $dataMenu = Categories::all();
        $menu = new RecursiveMenu($dataMenu);
        $htmlOption = $menu->recursiveMenu($product->category_id);
        return view("admin.products.edit", compact('htmlOption', 'product','attributeOld','attribute'));
    }

    public function delete($id){
        if (isset($id)){
            $product = Product::find($id);
          ProductImage::where("products_id",$id)->delete();
            \DB::table("attr_product")->where("product_id",$id)->delete();
          $product->delete();
            return redirect()->route("products.index");
        }
       return redirect()->back();
    }

    public function update(AdmimProductRequest $request,$id)
    {
//        dd($request->all());
        try{
            DB::beginTransaction();
            $dataUpdate = Product::find($id);
            $dataUpdate->pro_name = $request->pro_name;
            $dataUpdate->pro_slug = Str::slug($request->pro_name);
            $dataUpdate->unit_price = $request->unit_price;
            $dataUpdate->discount = $request->discount;
            $dataUpdate->quatity = $request->quatity;
            $dataUpdate->pro_description = $request->pro_description;
            $dataUpdate->pro_content = $request->pro_content;
            $dataUpdate->category_id = $request->category_id;
            $dataUpdate->active = $request->active;
            $discount = ((100 - $request->discount)/100);
            $dataUpdate->sale_price = ($discount * $request->unit_price);

            //upload 1 ảnh

            if(!empty($request->hasFile('pro_img'))){
                $imgFirst = $this->storageTraitUpalod($request,'pro_img',"product");
            }
            if(!empty($imgFirst)){
                $dataUpdate->pro_img = $imgFirst['pro_img'];
                $dataUpdate->path_img = $imgFirst['path_img'];
            }
            //dd($dataUpdate);

            $update =  $dataUpdate->save();
            if ($update){
                $attr_pro = $request->attr_pro;
                //dd($attr_pro);
                if(isset($attr_pro)){
                    $data = [];
                    foreach ($attr_pro as $value){
                        $item = [
                            'attr_id' => $value,
                            'product_id' => $id
                        ];
                        array_push($data,$item);
                    }
                    //dd($data);
                    if(!empty($data)){
                        \DB::table("attr_product")->where("product_id",$id)->delete();
                        \DB::table("attr_product")->insert($data);
                    }

                }
            }

            //upload nhiều ảnh
           // dd($request->pro_multi_img);
            if(!empty($request->hasFile('pro_multi_img'))){
                foreach ($request->pro_multi_img as $item){
                    $dataMultiImg = $this->storageTraitUpalodMultiFile($item,'product');
                    ProductImage::where('products_id',$id)->update([
                        "products_id" => $id,
                        "path_img" => $dataMultiImg['path_img'],
                        "pro_img_name" =>$dataMultiImg['pro_img_name'],
                    ]);
                }
            }

            DB::commit();
            return redirect()->route("products.index");
        }catch (\Exception $exception){
            DB::rollBack();
           \Log::error('Message:'.$exception->getMessage().'Line: '.$exception->getLine());

        }

    }

}
