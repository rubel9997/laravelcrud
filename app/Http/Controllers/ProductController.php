<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $products=Product::all();
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'required|numeric',
            'description'=>'required',
        ]);

        $products=new Product();
        $products->category_id=$request->category_id;
        $products->name=$request->name;
        $products->price=$request->price;
        $products->description=$request->description;

        if ($products->save()) {
            return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
        } else {
            Session::flash('error', 'Something went wrong!');
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category=Category::all();
        return view('products.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'required|numeric',
            'description'=>'required',
        ]);

        $products=$product;
        $products->category_id=$request->category_id;
        $products->name=$request->name;
        $products->price=$request->price;
        $products->description=$request->description;

        if ($products->save()) {
            return redirect()->route('products.index')
                        ->with('success','Product update successfully.');
        } else {
            Session::flash('error', 'Something went wrong!');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product Delete Successfully');

    }
}
