@extends('layouts.shop')
@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
           
                       @foreach($purchases as $purchase)

                           
                           <div class="col-xs-6 col-sm-4 col-md-4 ">
                               <div class="mycart_box">
                                   {{$purchase->name}} <br>
                                   {{$purchase->price}}円<br>
                                   {{$purchase->type}}タイプ<br>
                                   @if(file_exists(public_path().$purchase->image))
                                   <img src="{{$purchase->image}}"alt="" class="incart">
                                   @endif
                                   <br>
                               </div>

                                {{-- 追加 --}}
                               <a class="text-center" href="/">商品一覧へ</a>
                                {{-- ここまで --}}  
 
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