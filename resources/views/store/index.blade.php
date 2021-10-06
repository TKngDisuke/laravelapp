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
   <td>{{$store->getData()}}</td>
@endforeach
   </table>
   <div style="margin:10px;"></div>
@endsection
@section('footer')
copyright 2017 tuyano.
@endsection
<a href="http://127.0.0.1:8000/store/form">店舗を追加する</a>
