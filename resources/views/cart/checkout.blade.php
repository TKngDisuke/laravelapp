@extends('layouts.shop')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           {{ Auth::user()->name }}さんご購入ありがとうございました</h1>

           <div class="card-body">
               <p>ご登録頂いたメールアドレスへ決済情報をお送りしております。お手続き完了次第商品をお作り致します。</p>                
               <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
                こちらの画面を店員に表示させてください。購入番号は{{$pass_id}}です。</h1>
               <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
                暗証番号は{{$pass}}です。</h1> 
                商品を受け取るまではこの画面を移動しないでください。

               <a href="./image/shop">商品一覧へ</a>

               <a href="./shop/history">購入履歴</a>
           </div>
           </div>
       </div>
   </div>
</div>
@endsection