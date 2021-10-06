@extends('layouts.shop')
@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">注文履歴</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
           
                       @foreach($histories as $item)

                           
                           <div class="col-xs-6 col-sm-4 col-md-4 ">
                               <div class="mycart_box">
                                注文ID{{$item->id}}<br>
                                   {{$item->name}} <br>
                                   {{$item->price}}円<br>
                                   注文パスワード{{$item->password}}<br>
                                   
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