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
}
