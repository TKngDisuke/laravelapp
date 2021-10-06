<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;　

class Carts extends Model
{
    protected $guarded = array('id');
    protected $fillable = [
      'stock_id', 'user_id',
  ];
    public $timestamps = false;
    public static $rules = array(
       'stock_id' => 'required|integer',
       'user_id' => 'required|integer',
    );
    public function getData()
    {
       return $this->id . ' (' 
          . $this->timestamps .'注文ID: '.$this->stock_id . '注文者ID: '.$this->user_id . ')';
    }
    public function showCart()
   {
       $user_id = Auth::id();
       return $this->where('user_id',$user_id)->get();
   }
   public function stock()
   {
       return $this->belongsTo('\App\Models\Stock');
   }
   public function addCart($stock_id)
   {
       $user_id = Auth::id(); 
       $cart_add_info = Cart::firstOrCreate(['stock_id' => $stock_id,'user_id' => $user_id]);

       if($cart_add_info->wasRecentlyCreated){
           $message = 'カートに追加しました';
       }
       else{
           $message = 'カートに登録済みです';
       }

       return $message;
   }
    use HasFactory;
}