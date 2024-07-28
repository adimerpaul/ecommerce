<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller{
    function index(){
        return Carousel::all();
    }
    function store(Request $request){
//        $carousel = Carousel::create($request->all());
        $file = $request->file('file');
        $name = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('images'), $name);
        $carousel = new Carousel();
        $carousel->imagen = $name;
        $carousel->save();
        return $carousel;
    }
    function update(Request $request, $id){
        $file = $request->file('file');
        $name = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('images'), $name);
        $carousel = Carousel::find($id);
        $carousel->imagen = $name;
        $carousel->save();
        return $carousel;
    }
    function destroy($id){
        Carousel::destroy($id);
        return $id;
    }
}
