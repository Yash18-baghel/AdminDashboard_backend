<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $product = new Product;
        $product->admin_id = $req->input('admin_id');
        $product->brand_name = $req->input('brand_name');
        $product->product_name = $req->input('product_name');
        $product->quantity = $req->input('quantity');
        $product->total = $req->input('quantity');
        $product->product_pic = $req->file('img')->store('product_img');
        $product->save();
        //creating a product
        return $product;
        
    }

    Public function AllProductdetails($id){
        // $_GET
        
        $product = Product::where('admin_id',$id)->get();
        return $product;
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
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function searchProduct(Request $req)
    {
        $name = $req->name;
        $product = Product::where('product_name', 'LIKE', "%{$name}%")
        ->orWhere('brand_name', 'LIKE', "%{$name}%")
        ->get();
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function signleProduct($id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function UpdateProduct($id,Request $request, Product $product)
    {
        // return [$request->file('product_pic'),1];
        $product = Product::where('id',$id)->first();
        if(isset($request->product_name)){
            $product->product_name = $request->product_name;
        }
        if(isset($request->brand_name)){
            $product->brand_name = $request->brand_name;
        }
        if(isset($request->quantity)){
            $product->quantity += (int)$request->quantity;
            $product->total += (int)$request->quantity;
        }
        if(isset($request->sold)){
            $product->sold += (int)$request->sold;
            $product->quantity -= (int)$request->sold;
        }
        
        // if(isset($request->product_pic)){
        //     $product->product_pic = $request->file('product_pic')->store('product_img');
        // }
        
        $product->update();
        return $product;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function DeleteProduct($id)
    {
        // $id = 25;
        $product = Product::where('id',$id)->first();
        if($product)
        {
            $product->delete();
            return [TRUE,$product];
    
        }
        else{
            return [FALSE,'PRODUCT NOT FOUND'];
        }
    }
}
