<?php

namespace App\Http\Controllers;

use App\NewOrder;
use App\Serve;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $cafe ['resturants']=NewOrder::OrderBy('id','asc')->paginate(10);

        return view('resturant.index',$cafe);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating form before storing into database
        $request -> validate([
            'name'=>'required',
            'table_num' => 'required | min:2 | max:2',
            'order' => 'required'
        ]);
        
        $order = array(
             'name' => $request->name,
             'table_num' => $request->table_num,
             'order' => $request->order,
        );
        NewOrder::create($order);
        return redirect()->route('resturant.index')->with('success','New Order Placed Successfully!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function show(resturant $resturant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function edit(resturant $resturant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validating form before updating into database
        $request -> validate([
            'name'=>'required',
            'table_num' => 'required | min:2 | max:2',
            'order' => 'required'
        ]);

        $order = array(
            'name' => $request->name,
            'table_num' => $request->table_num,
            'order' => $request->order,
       );
       // echo "<pre>"; print_r($resturant); die;          This code shoes the selected resturant information 

       NewOrder::findOrfail($request->resturant_id)->update($order);
       return redirect()->route('resturant.index')->with('success','Order Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        // storing data in Served table before deleting it 
        $complete = NewOrder::find($req->resturant_id);
        $serve = array(
            'name' => $complete->name,
            'table_num' => $complete->table_num,
            'order' => $complete->order,
       );
       Serve::create($serve);

        $delete = $req->all();
       // echo "<pre>"; print_r($delete); die;      This code shoes the selected resturant information 
    
     $deleteresturant = NewOrder::findOrfail($req->resturant_id);
     $deleteresturant->delete();
       return redirect()->route('resturant.index')->with('success','Order Served! Thank you');;
    }

    public function serve()
    {
        $cafe ['serve']=Serve::OrderBy('id','asc')->paginate(10);
        return view('resturant.served',$cafe);
    }
}
