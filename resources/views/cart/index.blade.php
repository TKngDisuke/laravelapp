@extends('layouts.shop')

@section('title', 'Shop.index')

@section('menubar')
   @parent
   インデックスページ
@endsection
@section('content')
<div class="">
   <div class="mx-auto" style="max-width:1200px">
      <h1 style="color:#75ade2;  font-size:3em; padding:24px 0px;">
          <tr><th>注文画面</th></tr>
<h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
  

   {{ Auth::user()->name }}さんのカートの中身</h1>
   <div class="">
   <table>

      <p class="text-center">{{ $message??''}}</p><br>
      @if($my_carts->isNotEmpty()) 
      <div class="d-flex flex-row flex-wrap">

         @foreach($my_carts as $my_cart)
         <div class="mycart_box">
            {{$my_cart->product->name}} <br>                                
            {{ number_format($my_cart->product->price)}}円 <br>
            {{$my_cart->count}}個 <br>     
            @if(file_exists(public_path().$my_cart->product->image))
            <img src="{{$my_cart->product->image}}"alt="" class="incart">
            @endif
            <br>
            <form action="shop" method="post">
               @csrf
               <input type="hidden" name="stock_id" value="{{ $my_cart->product->id }}">
               <input type="submit" value="カートにもう一個追加">
           </form>
                 <br>
                 <br>
                 
                 <form action="shop/cartdel" method="post">
                     @csrf
                     <input type="hidden" name="stock_id" value="{{ $my_cart->product->id }}">
                     <input type="submit" value="カートから削除する">
                 </form>
         </div>
     @endforeach
     <div class="text-center p-2">
      個数：{{$count}}個<br>
      <p style="font-size:1.2em; font-weight:bold;">合計金額:{{number_format($sum)}}円</p>  
  </div>  
  <form action="/checkout" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger btn-lg text-center buy-btn" >購入する</button>
  </form>
  @else
  <p class="text-center">カートはからっぽです。</p>
@endif
  
<a href="{{ url('./image/shop') }}">商品一覧へ</a>
         </div>
      </div>
   </table>
   <div style="margin:10px;"></div>
</div>
</div></div>

@endsection
@section('footer')
copyright 2017 tuyano.
@endsection

