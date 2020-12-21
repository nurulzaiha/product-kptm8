<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        // query training
     //  $trainings = \App\Models\Training::all();//return semua
       $products = \App\Models\Product::paginate(5);
   // dd($trainings); //cara nak debug

    
    //return to view 
    //resources/views/trainings/index.blade.php
    //return view('trainings.index');
    return view('products.index',compact('products'));
}

public function create(){

    //resources/views/trainings/create.blade.php
    return view('products.create');
}
    
public function store(Request $request){
    
    //store all data from form to training table
    //dd($request->all());
    //method 1 - POPO - Plain Old PHP Object
    $product = new Product();
    $product->name = $request->name;
    $product->description= $request-> description;
    $product->price= $request-> price;
    $product->user_id= auth()->user()->id;
    $product->save();

    //return redirect back
    return redirect()->back();
}

public function show($id){
    //find id on table using model
    $product = Product ::find($id);
//dd($training);
    //return to view
    return view('products.show', compact('product'));
}

public function edit($id){
    //find id
    $product = Product ::find($id);

    //return to view
    return view('products.edit', compact('product'));
}
//public function update($id,Request $request){ -- ni asal xinstatiate
//public function update(training $training,Request $request){ --find dah instatiate
    // $training = Training ::find($id); --xpyh dah ltk kalo dah instatiate
public function update($id,Request $request){
    //find id at table
    $product = Product ::find($id);

    //update training
    //method 1-popo(xguna ni)
    //method 2-mass assignment (so guna ni)-define fillable input property kat model
    //$training ->update($request->all()); --ni utk update semua
    $product ->update($request->only('name','description','price'));

    //return to training
    return redirect()->route('product:list');
}

public function delete(Product $product){
    $product->delete();
    return redirect()->route('product:list');
}

}
