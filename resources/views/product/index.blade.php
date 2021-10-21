@extends('layouts.shop')
@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
           
                       @foreach($products as $product)

                           
                           <div class="col-xs-6 col-sm-4 col-md-4 ">
                               <div class="mycart_box">
                                   {{$product->name}} <br>
                                   {{$product->price}}円<br>
                                   {{$product->type}}タイプ<br>
                                   <a href="http://127.0.0.1:8000/image/edit?id={{$product->id}}">編集</a>
                                   <a href="http://127.0.0.1:8000/image/del?id={{$product->id}}">削除</a>
                                   @if(file_exists(public_path().$product->image))
                                   <img src="{{$product->image}}"alt="" class="incart">
                                   @endif
                                   <br>
                     
                               </div>
                           </div>
                       @endforeach                    
               </div>
               <div class="text-center" style="width: 200px;margin: 20px auto;">
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
<a href="http://127.0.0.1:8000/image/form">商品を追加する</a>