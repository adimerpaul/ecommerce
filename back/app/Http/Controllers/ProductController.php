<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
class ProductController extends Controller{
    function uploadProduct(Request $request, $id){
        $validated = $request->validate([
            'file' => 'required|image',
        ]);

        $name = time().'_'.$validated['file']->getClientOriginalName();

        $field = $request->field;

        $validated['file']->move(public_path('images'), $name);

        $manager = new ImageManager(new Driver());
        $image = $manager->read('images/'.$name);
        $image->scale(height: 600);
        $image->save('images/'.$name);

        $product = Product::find($id);
        $product->$field = $name;
        $product->save();

        return Product::with('category','subCategory')->find($id);
    }
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
