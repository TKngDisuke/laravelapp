<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail; //追記
use App\Mail\Thanks;//追記
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Store;
use App\Models\Purchasehistory;
use App\Models\Product;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
  

class CartController extends Controller
{
    public function mycart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('cart.index',$data);
    }
    public function store(Store $store)
    {
        $data = $store->showStore();
        return view('cart.store',$data);
    }


    public function addMycart(Request $request,Cart $cart)
    {
 
        //カートに追加の処理
        $stock_id=$request->stock_id;
        $message = $cart->addCart($stock_id);
 
        //追加後の情報を取得
        $data = $cart->showCart();
 
        return view('cart.index',$data)->with('message',$message); //追記
 
    }
 
    public function remove(Request $request,Cart $cart)
    {
 
        //カートから削除の処理
        $stock_id=$request->stock_id;
        $message = $cart->deleteCart($stock_id);
 
        //追加後の情報を取得
        $data = $cart->showCart();
 
        return view('cart.index',$data)->with('message',$message);//追記
 
    }
    public function checkout(Request $request,Cart $cart,Purchasehistory $purchasehistory)
   {
       $user = Auth::user();
       $mail_data['user']=$user->name; //追記
       $mail_data['checkout_items']=$cart->checkout2Cart(); //編集（カート削除してない）
       Mail::to($user->email)->send(new Thanks($mail_data));//編集
       $data['a']=$cart->checkoutCart(); //カート内の削除もしてデータを格納
          //cart,checkout_itemsのpriceを取ってsumに

       $pas2=$purchasehistory->art($data['a']);
       //ここでpurchaseにcartのデータを入れる
       return view('cart.checkout',$pas2);
        //合計金額の処理
   }
}
