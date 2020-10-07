<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function addCart($id){
        $productItem = Product::find($id);
            //dd($productItem);
        \Cart::add([
            'id' => $id,
            'name' => $productItem->pro_name,
            'qty' => 1,
            'price' => $productItem->discount == 0 ? $productItem->unit_price : $productItem->sale_price,
            'weight' =>1,
            'options' => [
                'img' => $productItem->path_img,
                'sale' => $productItem->discount,
                'sale_price' => $productItem->sale_price,
                'unit_price' => $productItem->unit_price,
            ]]);
        return redirect()->back();

    }
    public function index(){

        $carts = \Cart::content();
        //dd($carts);
        return view("frontend.checkCart",compact('carts'));
    }
    public function delete($id){

        $cart = \Cart::content()->where('rowId',$id);
        if($cart->isNotEmpty()){
            \Cart::remove($id);
        }
        return redirect()->back();
    }
}
