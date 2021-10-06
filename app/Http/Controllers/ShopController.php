<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
  

class ShopController extends Controller
{
     public function mycart(Cart $cart)
     {
         $my_carts = $cart->showCart();
         return view('cart.index',compact('my_carts'));
     }
    public function addmycart(Request $request,Cart $cart)
   {

       //カートに追加の処理
       $stock_id=$request->stock_id;
       $message = $cart->addCart($stock_id);

       //追加後の情報を取得
       $my_carts = $cart->showCart();

       return view('mycart',compact('my_carts' , 'message'));

   }
}