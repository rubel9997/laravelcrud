@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="pull-right mt-2 ms-2">
                        <a class="btn btn-success" href="{{ route('category.create') }}"> Create Category</a>
                        <a class="btn btn-info" href="{{ route('home') }}"> Dashboard</a>
                        <a class="btn btn-primary" href="{{ route('category.index') }}"> Refresh</a>
                    </div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light mt-2" style="width: 580px;">

                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <a href="{{ route('category.show',$category->id) }}" class="btn btn-primary">Show</a>
                                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('category.destroy',$category->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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
