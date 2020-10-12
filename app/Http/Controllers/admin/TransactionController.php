<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index(){
        $data = Transaction::latest()->paginate(5);
       //dd($data);
        return view("admin.transaction.index",compact('data'));
    }

    public function delete($id){
        $transaction = Transaction::findorFail($id);
        $transaction->delete();
        Order::where('or_transaction_id',$id)->delete();
        return redirect()->back();
    }
    public function show(Request $request,$id){
        //if($request->ajax()){
            $orders = Order::with("product")->where("or_transaction_id",$id)->get();
            $html = view('admin.component.order',compact('orders'))->render();
            return response(
                ['html'=>$html]
            );
       // }

    }
}
