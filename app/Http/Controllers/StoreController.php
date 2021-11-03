<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Cart;
use App\Models\Purchasehistory;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class StoreController extends Controller
{
    public function index()
    {
     $store = Store::all();//レコード取得
     return view('store.index',compact('store')); //一覧ページ表示
     }
    public function form()
    {    
        return view('store.form'); //一覧ページ表示
    }
    public function store(Request $request)
    {
        $this->validate($request, Store::$rules);
        $store = new Store;
        $store->name =$request->name;
        $store->adress =$request->adress;
        $store->time =$request->time;
        $store->phone =$request->phone;
        $store->MOtime =$request->MOtime;
        $store->audience_seat =$request->audience_seat;
        $store->parking =$request->parking;        
        $store->others =$request->others;
        $store->save();
        return redirect ('owner/store/form');
    }
 public function edit(Request $request)
 {
    $store = Store::find($request->id);
    return view('store.edit', ['form' => $store]);
 }
 public function update(Request $request)
 {
    $this->validate($request, Store::$rules);
    $store = Store::find($request->id);
    $store->name =$request->name;
    $store->adress =$request->adress;
    $store->time =$request->time;
    $store->phone =$request->phone;
    $store->MOtime =$request->MOtime;
    $store->audience_seat =$request->audience_seat;
    $store->parking =$request->parking;        
    $store->others =$request->others;
    $store->save();
    return redirect('owner/store');}
 public function delete(Request $request)
 {
    $store = Store::find($request->id);
    return view('store.del', ['form' => $store]);
 }
 public function remove(Request $request)
 {
    Store::find($request->id)->delete();
    return redirect('ower/store');
 }

 public function receive(Purchasehistory $purchasehistory)
 {
   $data = $purchasehistory->showPurchase();//レコード取得
   return view('store.purchase',$data); //一覧ページ表示
 }


}