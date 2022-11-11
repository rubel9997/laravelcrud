@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="pull-right mt-3 ms-4">
                        <div class="pull-left">
                            <h4>Update Product</h4>
                        </div>
                        <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 580px;">
                            <form action="{{ route('products.update',$product->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Select Category:</strong>
                                            <select class="form-control" name="category_id" id="category_id" required>
                                                <option value="{{$product->category->id}}">{{$product->category->title}}</option>
                                                @foreach($category as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Product Name :</strong>
                                            <input type="text" name="name" required class="form-control" value="{{ $product->name }}"
                                                placeholder="Product Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Product Price :</strong>
                                            <input type="number" name="price" required value="{{ $product->price }}" class="form-control"
                                                placeholder="Product Price">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Product Description:</strong>
                                            <input type="text" name="description" required value="{{ $product->description }}" class="form-control"
                                                placeholder="Product Description">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
