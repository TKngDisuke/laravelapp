<?php

namespace App\Http\Controllers;
use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class HelloController extends Controller
{

public function index(Request $request)
{
   if(!$request->sort) {
      $sort = 'id';
  } else {
      $sort = $request->sort;
  }
   $items = Person::orderBy($sort, 'asc')
       ->paginate(5);
   $param = ['items' => $items, 'sort' => $sort];
   return view('hello.index', $param);
}

    
    
    
   public function post(Request $request)
   {
       $items = DB::select('select * from progate.people');
       return view('hello.index', ['items' => $items]);
   }

   public function add(Request $request)
   {
      return view('hello.add');
   }
   
   public function create(Request $request)
   {
      $param = [
          'name' => $request->name,
          'mail' => $request->mail,
          'age' => $request->age,
      ];
      DB::table('progate.people')->insert($param);
      return redirect('/hello');
   }
   
   public function edit(Request $request)
   {
      $item = DB::table('progate.people')
          ->where('id', $request->id)->first();
      return view('hello.edit', ['form' => $item]);
   }
   
   public function update(Request $request)
   {
      $param = [
          'name' => $request->name,
          'mail' => $request->mail,
          'age' => $request->age,
      ];
      DB::table('progate.people')
          ->where('id', $request->id)
          ->update($param);
      return redirect('/hello');
   }
   
   public function del(Request $request)
   {
      $item = DB::table('progate.people')
          ->where('id', $request->id)->first();
      return view('hello.del', ['form' => $item]);
   }
   
   public function remove(Request $request)
   {
      DB::table('progate.people')
          ->where('id', $request->id)->delete();
      return redirect('/hello');
   }
   
public function show(Request $request)
{
   $page = $request->page;
   $items = DB::table('progate.people')
       ->offset($page * 3)
       ->limit(3)
       ->get();
   return view('hello.show', ['items' => $items]);
}
public function rest(Request $request)
{
   return view('hello.rest');
}
public function ses_get(Request $request)
{
   $sesdata = $request->session()->get('msg');
   return view('hello.session', ['session_data' => $sesdata]);
}

public function ses_put(Request $request)
{
   $msg = $request->input;
   $request->session()->put('msg', $msg);
   return redirect('hello/session');
}




}