<?php
namespace App\Http\Controllers;
use App\Models\Restdata;
use Illuminate\Http\Request;

class RestappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = Restdata::all();
       return $items->toArray();
    }
    
    public function show($id)
    {
       $item = Restdata::find($id);
       return $item->toArray();
    }
    public function create()
    {
       return view('rest.create');
    }
    
    public function store(Request $request)
    {
       $restdata = new Restdata;
       $form = $request->all();
       unset($form['_token']);
       $restdata->fill($form)->save();
       return redirect('/rest');
    }
    public function rest(Request $request)
    {
       return view('hello.rest');
    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
