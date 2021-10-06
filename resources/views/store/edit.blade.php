@extends('layouts.helloapp')

@section('title', 'Store.Edit')

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

    <form method="post" action="/store/edit"> 
        @csrf
       <input type="hidden" name="id" value="{{$form->id}}">
        <tr><th>name: </th><td><input type="text" name="name" value="{{$form->name}}"></td></tr>
        <tr><th>address:
            </th><td><input type="text" name="adress" value="{{$form->adress}}"></td></tr>
        <tr><th>time:
            </th><td><input type="text" name="time" value="{{$form->time}}"></td></tr>
        <tr><th>phone:
            </th><td><input type="text" name="phone" value="{{$form->phone}}"></td></tr>
        <tr><th>MOtime:
            </th><td><input type="text" name="MOtime" value="{{$form->MOtime}}"></td></tr>
        <tr><th>audience_seat:
            </th><td><input type="number" name="audience_seat" value="{{$form->audience_seat}}"></td></tr>
        <tr><th>parking:
            </th><td><input type="number" name="parking" value="{{$form->parking}}"></td></tr>
            <tr><th>others:
            </th><td><input type="text" name="others" value="{{$form->others}}"></td></tr>
            <tr><th></th><td><input type="submit"
                value="send"></td></tr>
   </form>
   </table>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection