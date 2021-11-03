<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchasehistory;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PurchasehistoryController extends Controller
{
    public function index(Purchasehistory $purchasehistory)
    {
     $data = $purchasehistory->showPurchase();//レコード取得
     return view('purchase.index',$data); //一覧ページ表示
     }
     public function receive(Request $request,Purchasehistory $purchasehistory)
     {
  
         //カートに追加の処理
         $purchase_id=$request->id;//受け取った購入IDを記憶

        $purchasehistory->addPurchase($purchase_id);//購入IDのreceiveを１にする挙動
  
         //追加後の情報を取得
         $data = $purchasehistory->showPurchase();//レコード取得
  
         return view('purchase.index',$data); //
  
     }
}
