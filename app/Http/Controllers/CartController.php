<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = auth()->user()->carts;

        $sum = 0;

        foreach ($carts as $cart) {
            $sum += ($cart->product->price * $cart->quantity);
        }

        //$carts->unique('product_id');

        return view('malls.cart', compact('carts', 'sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cart = Cart::where('product_id', $request->product)->where('user_id', auth()->user()->id)->count() > 0 ? Cart::where('product_id', $request->product)->where('user_id', auth()->user()->id)->first() : null;

        if ($cart == null){
            Cart::create([
                'product_id' => $request->product,
                'user_id' => auth()->user()->id,
                'quantity' => 1
            ]);

        }else{

            if ($cart->quantity+ 1 > $cart->product->quantity){
                return redirect()->back()->withErrors(['Stock Not Enough!']);
            }

            $cart->quantity++;

            $cart->save();
        }

        return redirect()->route('carts.index')->with('success',['Product Added']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::where('product_id', $request->product)->where('user_id', auth()->user()->id)->count() > 0 ? Cart::where('product_id', $request->product)->where('user_id', auth()->user()->id)->get() : null;

        if ($cart == null){
            Cart::create([
                'product_id' => $request->product,
                'user_id' => auth()->user()->id,
                'quantity' => 1
            ]);

        }else{

            if ($cart->quantity+ 1 > $cart->product->quantity){
                return redirect()->back()->withErrors(['Stock Not Enough!']);
            }

            $cart->quantity++;

            $cart->save();
        }

        return redirect()->route('carts.index')->with('success',['Product Added']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        if ($request->quantity < 1){
            $cart->delete();
        }else{

            if ($request->quantity > $cart->product->quantity){
                return redirect()->back()->withErrors(['Stock Not Enough!']);
            }

            $cart->quantity = $request->quantity;

            $cart->save();
        }


        return redirect()->route('carts.index')->with('success',['Cart Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function updateCart(Request $request){

        $carts = auth()->user()->carts;

        foreach($carts as $cart){
            if ($request->input('quantity_product_' . $cart->product->id) > 0 ){
                $cart->quantity = $request->input('quantity_product_' . $cart->product->id);

                $cart->save();

            }else{
                $cart->delete();
            }
        }

        return redirect()->route('carts.index')->with('success',['Cart Updated!']);
    }
}
