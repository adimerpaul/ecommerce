<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{
    function index(){
        return Product::with('category','subCategory')->get();
    }
    function show($id){
        return Product::with('category','subCategory')->find($id);
    }
    function  update(Request $request, $id){
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }
}
