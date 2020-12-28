

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        @if(session()->has('alert-type'))
        <div class="alert {{session()->get('alert-type')}}">
        {{session()->get('alert')}}
        </div>
        @endif



            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <table class="table">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Description</th>
<th>Product Price</th>
<th>User ID</th>
<th>User</th>
<th>Email</th>
<th>Created at</th>
<th>Actions</th>

</tr>
</thead>
<tbody>
    @foreach($products as $product)
               
            <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>

           
            <td>{{$product->price}}</td>
            <td>{{$product->user_id}}</td>
            <td>{{$product->user->name}}</td>
            <td><strong>{{$product->user->email}}</strong></td>
            <td>{{$product->created_at ? $product-> created_at->diffForHumans():'No data'}}</td>
            <td>
            <a href="{{route('products:show', $product)}}" class="btn btn-primary">View</a>
            </td>
            <td>
            <a href="{{route('products:edit', $product)}}" class="btn btn-success">Edit</a>
            </td>
            <td>
            <a onclick="return confirm('Are you sure want to delete?')" href="{{route('products:delete', $product)}}" class="btn btn-danger">Delete</a>
            </td>
            </tr>

    @endforeach
</tbody>

</table>

{{$products->Links()}}
              
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
