@extends('layouts.helloapp')

@section('title', 'Store.index')

@section('menubar')
   @parent
   インデックスページ
@endsection
@section('content')
   <table>
   <tr><th>店舗</th>
   @foreach($store as $store)

                           
   <div class="col-xs-6 col-sm-4 col-md-4 ">
       <div class="mycart_box">
           名前:{{$store->name}} <br>
           住所:{{$store->adress}} <br>
           営業時間:{{$store->time}}<br>
           電話番号:{{$store->phone}} <br>
           モバイルオーダー対応時間:{{$store->MOtime}} <br>
           客席数:{{$store->audience_seat}}席<br>
           駐車場台数:{{$store->parking}}台 <br>
           {{$store->others}} <br>
           <a href="./edit?id={{$store->id}}">編集</a>
           <a href="./del?id={{$store->id}}">削除</a>
           <br>
           <br>
           <br>

       </div>
   </div>  
@endforeach
   </table>
   <div style="margin:10px;"></div>
@endsection
@section('footer')
copyright 2017 tuyano.
@endsection
<a href="./form">店舗を追加する</a>
