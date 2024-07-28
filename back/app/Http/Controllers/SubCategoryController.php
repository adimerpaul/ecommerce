<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller{
    function index(){
        return SubCategory::all();
    }
    function store(Request $request){
        $subCategory = SubCategory::create($request->all());
        return $subCategory;
    }
    function update(Request $request, $id){
        $subCategory = SubCategory::find($id);
        $subCategory->update($request->all());
        return $subCategory;
    }
    function destroy($id){
        SubCategory::destroy($id);
        return $id;
    }
}
