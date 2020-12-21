

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">
               
<form method="POST" action="">
@csrf
<div class="form-group">
<label>Name</label>
<input type ="text" name="name" class="form-control" required value="{{$product->name}}">
</div>

<div class="form-group">
<label>Description</label>
<textarea name="description" class="form-control">{{$product->description}}</textarea>
</div>

<div class="form-group">
<label>Price</label>
<input type ="text" name="price" class="form-control" value="{{$product->price}}">
</div>

<div class="form-group">
<button type ="submit" class="btn btn-primary">Update My Product</button>
</div>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
