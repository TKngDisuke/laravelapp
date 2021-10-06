@extends('layouts.helloapp')

@section('title', 'Product.Delete')

@section('menubar')
   @parent
   削除ページ
@endsection

@section('content')
   <table>
   <form action="/store/del" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$form->id}}">
      <tr><th>name: </th><td>{{$form->name}}</td></tr>
      <tr><th>adress: </th><td>{{$form->adress}}</td></tr>
      <tr><th>time: </th><td>{{$form->time}}</td></tr>
      <tr><th>phone: </th><td>{{$form->phone}}</td></tr>
      <tr><th>MOtime: </th><td>{{$form->MOtime}}</td></tr>
      <tr><th>audience_seat: </th><td>{{$form->audience_seat}}</td></tr>
      <tr><th>parking: </th><td>{{$form->parking}}</td></tr>
      <tr><th>others: </th><td>{{$form->others}}</td></tr>
      <tr><th></th><td><input type="submit" value="削除"></td></tr>
   </form>
   </table>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection