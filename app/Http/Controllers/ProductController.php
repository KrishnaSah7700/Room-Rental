<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order;
use App\Systemsetting;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
class ProductController extends Controller
{
  public function index(){
        $data['categories'] = Category::where('status',1)->get();
        return view('backend.product.create', $data);
  }

  public function productDetails($id){

      if(!$id){
        return redirect()->back();
      }

      $product =  Product::find($id);
      $data['system'] = Systemsetting::find(1);
        $_SESSION['setting'] = $data['system'];
      if($product){
        return view('frontend.details', compact('product'));
      }

      if(!$id){
        session()->flash('error','Product Not Found!');
        return redirect()->back();
      }





  }


  public function placeOrder(Request $request,$id){
 
    if(!$id){
      return redirect()->back();
    }
    $product =  Product::find($id);
    $data['system'] = Systemsetting::find(1);
      $_SESSION['setting'] = $data['system'];

      $orderNo = rand(10,9999999999999);
    if($product){
     
      $data = [
        'order_no' => $orderNo,
        'user_id' => auth()->user()->id,
        'product_id' =>$id
      ];
   
     $order =  Order::create($data);
     if($order){
      $to = auth()->user()->email;
      Mail::to($to)->send(new OrderMail($order));
     }
    }



  }
}
