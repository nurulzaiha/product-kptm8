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

    //resources/views/products/create.blade.php
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
    //return redirect()->back();
    //ganti ini utk tambah alert

    return redirect()
    ->route('product:list')
    ->with([
        'alert-type'=>'alert-primary',
        'alert'=> 'Your training has been created!']);
}

public function show($id){
    //find id on table using model
    $product = Product ::find($id);
//dd($product);
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
//public function update(product $product,Request $request){ --find dah instatiate
    // $product = Product ::find($id); --xpyh dah ltk kalo dah instatiate
public function update($id,Request $request){
    //find id at table
    $product = Product ::find($id);

    //update product
    //method 1-popo(xguna ni)
    //method 2-mass assignment (so guna ni)-define fillable input property kat model
    //$product ->update($request->all()); --ni utk update semua
    $product ->update($request->only('name','description','price'));

    //return to product
    //return redirect()->route('product:list');
    return redirect()
    ->route('product:list')
    ->with([
        'alert-type'=>'alert-success',
        'alert'=> 'Your training has been updated!']);

}

public function delete(Product $product){
    $product->delete();
    
    //return redirect()->route('product:list');
    return redirect()
    ->route('product:list')
    ->with([
        'alert-type'=>'alert-danger',
        'alert'=> 'Your training has been deleted!']);
}

}
