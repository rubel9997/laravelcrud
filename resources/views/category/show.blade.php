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
                                ID No : {{$category->id}} <br>
                                Category Title : {{$category->title}}<br>
                                Created at : {{$category->created_at}}<br>
                                Updated at : {{$category->updated_at}}
                            </div>
                            <div class="">
                                <a href="{{ route('category.index') }}" class="btn btn-info">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
