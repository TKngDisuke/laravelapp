<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class Cart extends Model
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
    public function checkoutCart()
    {
        $user_id = Auth::id();
        $checkout_items=$this->where('user_id', $user_id)->get();
        $data['my_carts'] = $this->where('user_id',$user_id)->get();
        $data['sum']=0;

        foreach($data['my_carts'] as $my_cart){
            $data['sum']+=$my_cart->product->price*$my_cart->count;
        }//cart,checkout_itemsのpriceを取ってsumに 

        foreach ($checkout_items as$checkout_item){
        $checkout_item['sum']=$data['sum'];
        }
        $this->where('user_id', $user_id)->delete();
        return $checkout_items;
    }
    public function showCart()
   {
       $user_id = Auth::id();
       $data['my_carts'] = $this->where('user_id',$user_id)->get();

       $data['count']=0;
       $data['sum']=0;
       
       foreach($data['my_carts'] as $my_cart){
           $data['count']+=$my_cart->count;
           $data['sum'] += $my_cart->product->price*$my_cart->count;
       }
       return $data;
   }
   public function product()
   {
       return $this->belongsTo('\App\Models\Product', 'stock_id' , 'id');
   }
   public function addCart($stock_id)
   {
       $user_id = Auth::id(); 
       if($this->where('user_id',$user_id)->where('stock_id',$stock_id)->exists()){//カート1個ある場合
//更新、count＋１
        $da=$this->where('user_id',$user_id)->where('stock_id',$stock_id)->first();
        $da['count']=$da['count']+1;
        $this->where('user_id',$user_id)->where('stock_id',$stock_id)->update(['count' =>$da['count']]);//+1にしたい、、、
       
    }else{
        Cart::firstOrCreate(['stock_id' => $stock_id,'user_id' => $user_id]);
        $this->where('user_id',$user_id)->where('stock_id',$stock_id)->update(['count' =>1]);
       }
           $message = 'カートに追加しました';


       return $message;
   }
   public function deleteCart($stock_id)
{
       $user_id = Auth::id(); 
       $delete = $this->where('user_id', $user_id)->where('stock_id',$stock_id)->delete();
       
       if($delete > 0){
           $message = 'カートから一つの商品を削除しました';
       }else{
           $message = '削除に失敗しました';
       }
       return $message;
}
public function checkout2Cart()
{
    $user_id = Auth::id();
    $checkout_items=$this->where('user_id', $user_id)->get();
    return $checkout_items;
}
    use HasFactory;
}