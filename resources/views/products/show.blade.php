

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show Product') }} - By: {{$product->user->name}}</div>

                <div class="card-body">
               
<form method="POST" action="">
@csrf
<div class="form-group">
<label>Name</label>
<input type ="text" name="name" class="form-control" required value="{{$product->name}}" readonly>
</div>

<div class="form-group">
<label>Description</label>
<textarea name="description" class="form-control" readonly>{{$product->description}}</textarea>
</div>

<div class="form-group">
<label>Price (RM)</label>
<input type ="text" name="price" class="form-control" required value="{{$product->price}}" readonly>
</div>


<strong><a class="nav-Link" href="{{route('product:list')}}">Back to product list</a></strong>
</div>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
