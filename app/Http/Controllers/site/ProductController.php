<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

    }
    public function detailProduct($id){

        $detail = Product::findOrFail($id);

       $sameProduct = Product::where("id","<>",$id)->whereIn("category_id",[$detail->category_id])->take(4)->get();

       $proImg = ProductImage::where("products_id",$id)->get();
       //dd($proImg);
       return view("frontend.detailProduct",compact('detail','sameProduct','proImg'));

    }
}
