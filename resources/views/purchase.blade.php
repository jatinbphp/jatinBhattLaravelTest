@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)

    <tr>
      <th scope="row">{{$product['id']}}</th>
      <td>{{$product['name']}}</td>
      <td>{{$product['description']}}</td>
      <td>{{$product['price']}}</td>
      <td><a href="{{ route('plans.show', $product['id']) }}" class="btn btn-primary pull-right">Choose</a></td>
    </tr>    
    @endforeach
  </tbody>
</table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
