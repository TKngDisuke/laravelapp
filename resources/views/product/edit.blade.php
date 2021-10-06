@extends('layouts.helloapp')

@section('title', 'Product.Edit')

@section('menubar')
   @parent
   編集ページ
@endsection

@section('content')
   @if (count($errors) > 0)
   <div>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif
   <table>

    <form method="post" action="/image/edit" enctype="multipart/form-data"> 
        @csrf
       <input type="hidden" name="id" value="{{$form->id}}">
       <tr><th>name: </th><td><input type="text" name="name"
           value="{{$form->name}}"></td></tr>
           @if(file_exists(public_path().$form->image))
           現在の商品画像<img src="{{$form->image}}">
           @endif
       <tr><th>price: </th><td><input type="text" name="price"
           value="{{$form->price}}"></td></tr>
       <tr><th>type: </th><td><input type="number" name="type"
           value="{{$form->type}}"></td></tr>
            <p>&nbsp;</p>
            <tr><th>image: </th><td><input type="file" name="image" value="{{$form->image}}">
            </td></tr>
            <p>&nbsp;</p>
       <tr><th></th><td><input type="submit"
           value="send"></td></tr>
   </form>
   </table>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection