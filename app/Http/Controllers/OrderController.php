<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Stripe;
use Razorpay\Api\Api;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        if (auth()->user()->role->id == 3){

            $orders = auth()->user()->orders;

        }

        $columns = [
            'No',
            'Name',
            'Date Purchase',
            'Products',
            'Status',
            'Total (RM)',
            ''
        ];

        return view('malls.order', compact('orders', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $order = Order::create([
            'status' => 1,
            'total' => 0,
            'user_id' => auth()->user()->id
        ]);

        $sum = 0;

        foreach(auth()->user()->carts as $cart){
            $order->products()->attach($cart->product->id, ['quantity' => $cart->quantity]);

            $product = Product::find($cart->product->id);

            $product->quantity = $product->quantity - $cart->quantity;

            $sum += $cart->product->price * $cart->quantity;
        }

        foreach(auth()->user()->carts as $cart){
            $cart->delete();
        }

        $order->total = $sum;

        $order->save();

        return redirect()->route('orders.index')->with('success',['Order Updated']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'status' => 1,
            'total' => 0,
            'user_id' => auth()->user()->id
        ]);

        $sum = 0;

        foreach(auth()->user()->carts as $cart){
            $order->products()->attach($cart->product->id, ['quantity' => $cart->quantity]);

            $product = Product::find($cart->product->id);

            $product->quantity = $product->quantity - $cart->quantity;
            
            $sum += $cart->product->price * $cart->quantity;
        }

        foreach(auth()->user()->carts as $cart){
            $cart->delete();
        }

        $order->total = $sum;

        $order->save();

        return redirect()->route('orders.index')->with('success',['Order Updated']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success',['Order Deleted']);
    }

    public function checkout(Request $request){

        $api = new Api('rzp_test_qLU9YDoSgIEAyy', 'XfRXWQyLu6DkjH7ll2iJQZvm');
        $response = $api->order->create(array('receipt' => '123', 'amount' => $request->amount * 100, 'currency' => 'MYR'));
        $response = collect($response) ;

        return view('malls.checkout', compact('response'));
        
    }
}
