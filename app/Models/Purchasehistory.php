<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Builder;
class Purchasehistory extends Model
{
    public function art($data)
    {
        $pass=rand(0,100);
        $pass_id= $this->orderBy('purchase_id','desc')->first();
        $pas2['pass']=$pass;
        $pas2['pass_id']=1+$pass_id->purchase_id;
        foreach ($data as $item){
        $purchasehistory =new Purchasehistory;
        $purchasehistory->user_id = $item->user_id;
        $purchasehistory->stock_id = $item->stock_id;
        $purchasehistory->name = $item->product->name;
        $purchasehistory->price = $item->product->price;
        $purchasehistory->type = $item->product->type;
        $purchasehistory->password =$pass;
        $purchasehistory->purchase_id = 1+$pass_id->purchase_id;
        $purchasehistory->sum=$item->sum;
        $purchasehistory->receive=0;
        $purchasehistory->count=$item->count;
        $purchasehistory->save();
        }
        return $pas2;
    }
    public function showPurchase()
    {
        $user_id = Auth::id();
        $data['histories'] = $this->where('user_id',$user_id)->get();

        return $data;
    }
    public function addPurchase($a)//商品受け取り済みにする
    {
        $purchase_id = $a;
        $this->where('purchase_id',$purchase_id)->update(['receive'=>'1']);
    }
    public function ownershowPurchase()
    {
        $data['histories'] = $this->get();

        return $data;
    }
    use HasFactory;
    
}