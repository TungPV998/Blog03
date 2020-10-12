<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Product;
use App\Model\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function buyNow($id){

            $productItem = Product::find($id);
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
            return redirect()->route("shopping.list");

    }
    public function store(Request $request){
        $data = [
            'name'=>$request->name,
            'address'=>$request->address,
            'telephone'=>$request->telephone,
            'note'=>$request->note,
            'tst_type'=>$request->payment,
        ];
        if(isset(Auth::check()->id)){
            $data['user_id'] = Auth::check()->id;
        }
        $idTran = Transaction::insertGetId($data);
        if($idTran){
            $carts = \Cart::content();
            foreach ($carts as $item){
                Order::insert([
                   'or_transaction_id'=>$idTran,
                   'or_product_id'=>$item->id,
                   'or_sale'=>$item->options->sale,
                   'or_qty'=>$item->qty,
                   'or_price'=>$item->price,
                ]);
            }
        }
        \Cart::destroy();
        return view("frontend.buySuccess");
    }
}
