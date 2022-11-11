@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 580px;">
                            <div class="">
                                ID No : {{$product->id}} <br>
                                Product Category : {{$product->category_id}}<br>
                                Product Name : {{$product->name}}<br>
                                Product Price : {{number_format($product->price, 2)}} <br>
                                Product Description : {{$product->description}}
                            </div>
                            <div class="">
                                <a href="{{ route('products.index') }}" class="btn btn-info">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
