<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        $columns = [
            'No',
            'Name',
            'Price (RM)',
            'Quantity',
            'Status',
            'Categories',
            'Photos',
            '',
            ''
        ];

        return view('product.index', compact('products', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $statuses = [
            '0' => 'Selling',
            '1' => 'Sold out'
        ];
        
        return view('product.create', compact('categories', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'status' => 'required'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status
        ]);

        Photo::create([
            'source' => $request->file('front')->store('photos'),
            'front' => true,
            'product_id' => $product->id
        ]);

        if ($request->has('photos')){
            foreach($request->file('photos') as $photo){
                Photo::create([
                    'source' => $photo->store('photos'),
                    'front' => false,
                    'product_id' => $product->id
                ]);
            }
        }

        $product->categories()->attach($request->categories);

        return redirect()->route('products.index')->with('success',['Product Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $statuses = [
            '0' => 'Selling',
            '1' => 'Sold out'
        ];

        $categories = Category::all();

        return view('product.edit', compact('product', 'statuses', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'status' => 'required'
        ]);


        if ($request->has('front')){

            $photo = Photo::where('product_id', $product->id)->where('front',true)->first();

            $photo->source = $request->file('front')->store('photos');

            $photo->save();

            $photos = Photo::where('product_id', $product->id)->where('front',false)->get();

            foreach($photos as $photo){
                $photo->delete();
            }
    
            if ($request->has('photos')){
                foreach($request->file('photos') as $photo){
                    Photo::create([
                        'source' => $photo->store('photos'),
                        'front' => false,
                        'product_id' => $product->id
                    ]);
                }
            }
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->status = $request->status;

        $product->categories()->sync($request->categories);

        $product->save();

        return redirect()->route('products.index')->with('success',['Product Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success',['Product Deleted']);
    }
}
