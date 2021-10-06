@extends('layouts.helloapp')

@section('title', 'Product.Delete')

@section('menubar')
   @parent
   削除ページ
@endsection

@section('content')
   <table>
   <form action="/image/del" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$form->id}}">
      <tr><th>name: </th><td>{{$form->name}}</td></tr>
      <tr><th>price: </th><td>{{$form->price}}</td></tr>
      <tr><th>type: </th><td>{{$form->type}}</td></tr>
      <tr><th></th><td><input type="submit" value="削除"></td></tr>
   </form>
   </table>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection