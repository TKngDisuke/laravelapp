<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchasehistory;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OwnerController extends Controller
{
    public function index(Purchasehistory $purchasehistory)
    {
     $data = $purchasehistory->ownershowPurchase();//レコード取得
     return view('owner.index',$data); //一覧ページ表示
     }
     public function received(Purchasehistory $purchasehistory)
     {
      $data = $purchasehistory->ownershowPurchase();//レコード取得
      return view('owner.received',$data); //一覧ページ表示
      }
      public function notreceived(Purchasehistory $purchasehistory)
      {
       $data = $purchasehistory->ownershowPurchase();//レコード取得
       return view('owner.not_received',$data); //一覧ページ表示
       }
}




