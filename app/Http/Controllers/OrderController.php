<?php

namespace App\Http\Controllers;

use App\Models\Dastavka;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class OrderController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->with('order_products')->paginate(10);
        $products = Product::all();
        $dast= Dastavka::first();
        return view('app.order.index',compact('orders','dast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        return view('app.order.create',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
       
            'phone' => 'required',
        
         ]);

        $order = new Order();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->city = $request->input('city');
        $order->address = $request->input('address');
        $order->payment_method = $request->input('payment_method');
        $order->with_delivery = $request->input('with_delivery');
        $order->save();
        return redirect()->route('orders.index')->with('message','Order Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $products = Product::find($id);
        // $categories = Product::with('category')->get();
        // return view('app.products.show',compact('products','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('app.order.edit',compact('order'));
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
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
 
         ]);    

        $order =  Order::find($id);
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->city = $request->input('city');
        $order->address = $request->input('address');
        $order->payment_method = $request->input('payment_method');
        $order->with_delivery = $request->input('with_delivery');
        $order->update();
        return redirect()->route('orders.index')->with('message','Order Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return back()->with('message','Product Delete Successfully');
    }

}
