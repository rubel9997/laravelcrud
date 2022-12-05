@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="pull-right mt-2 ms-2">
                        <a class="btn btn-success" href="{{ route('products.create') }}"> Create Product</a>
                        <a class="btn btn-info" href="{{ route('home') }}"> Dashboard</a>
                        <a class="btn btn-primary" href="{{ route('products.index') }}"> Refresh</a>
                    </div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light mt-2">

                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Product price</th>
                                    <th>Product Description</th>
                                    <th>Product Category</th>
                                    <th width="220px">Action</th>
                                </tr>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category->title ?? 'No Title' }}</td>
                                    <td>
                                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
