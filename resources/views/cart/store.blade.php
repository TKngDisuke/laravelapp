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
          <tr><th>店舗選択画面</th></tr>
          <h1 class="text-left font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">

   <div class="">
   <table>
         @foreach($stores as $store)
            名前:{{$store->name}} <br>
            住所:{{$store->adress}} <br>
            営業時間:{{$store->time}}<br>
            電話番号:{{$store->phone}} <br>
            モバイルオーダー対応時間:{{$store->MOtime}} <br>
            客席数:{{$store->audience_seat}}席<br>
            駐車場台数:{{$store->parking}}台 <br>
            {{$store->others}} <br>
            <a href="./{{$store->id}}/image/shop">編集</a>  
            <br>
            <hr color=”#f0f8ff″>
     @endforeach
         </div>
      </div>
   </table>
</div>

@endsection
@section('footer')
copyright 2017 tuyano.
@endsection

