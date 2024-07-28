<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{
    function index(){
        return Category::all();
    }
    function store(Request $request){
        $category = Category::create($request->all());
        return $category;
    }
    function update(Request $request, $id){
        $category = Category::find($id);
        $category->update($request->all());
        return $category;
    }
    function destroy($id){
        Category::destroy($id);
        return $id;
    }
}
