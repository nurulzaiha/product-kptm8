<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        // query product
       $users = \App\Models\User::all();
   // dd($products); //cara nak debug

    
    //return to view 
    //resources/views/products/index.blade.php
    //return view('products.index');
    return view('users.index',compact('users'));
}
}
