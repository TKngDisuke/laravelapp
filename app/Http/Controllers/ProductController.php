<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index()
    {
     $products = Product::all();//レコード取得
     return view('product.index',compact('products')); //一覧ページ表示
     }
     public function shop()
     {
      $products = Product::all();//レコード取得
      return view('cart.shop',compact('products')); //一覧ページ表示
      }
    public function form()
    {    
        return view('product.form'); //一覧ページ表示
    }
    public function store(Request $request)
    {
        $this->validate($request, Product::$rules);
        $product = new Product;
        $product->name =$request->name;
        $product->price =$request->price;
        $product->type =$request->type;
        $a=Str::uuid();
        if($request->image){
            if($request->image->extension() == 'gif' || $request->image->extension() == 'jpeg' || $request->image->extension() == 'jpg' || $request->image->extension() == 'png'){
            $request->file('image')->storeAs('public/post_img', $a.'.'.$request->image->extension());
            }
        }
        $product->image='/storage/post_img/'.$a.'.'.$request->image->extension();
$product->save();
        return redirect ('/image/form');
    }
 public function edit(Request $request)
 {
    $product = Product::find($request->id);
    return view('product.edit', ['form' => $product]);
 }
 public function update(Request $request)
 {
    $this->validate($request, Product::$rules);
    $product = Product::find($request->id);
    $product->name =$request->name;
    $product->price =$request->price;
    $product->type =$request->type;
    $a=Str::uuid();
    if($request->image){
        if($request->image->extension() == 'gif' || $request->image->extension() == 'jpeg' || $request->image->extension() == 'jpg' || $request->image->extension() == 'png'){
        $request->file('image')->storeAs('public/post_img', $a.'.'.$request->image->extension());
        }
    }
    $product->image='/storage/post_img/'.$a.'.'.$request->image->extension();
    $product->save();
    return redirect('/image');}
 public function delete(Request $request)
 {
    $product = Product::find($request->id);
    return view('product.del', ['form' => $product]);
 }
 public function remove(Request $request)
 {
    Product::find($request->id)->delete();
    return redirect('/image');
 }


 
     
     
}