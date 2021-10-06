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
    use HasFactory;
    
}