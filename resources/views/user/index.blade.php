@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="pull-right mt-2 ms-2">
                        <a class="btn btn-info" href="{{ route('home') }}"> Dashboard</a>
                        <a class="btn btn-secondary" href="{{ route('admin.export') }}"> Export</a>
                        <a class="btn btn-success" href="{{ route('admin.create') }}"> Admin Create</a>
                        <a class="btn btn-primary" href="{{ route('admin.list') }}"> Refresh</a>
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
                                    <th> Name</th>
                                    <th> Username</th>
                                    <th> Email</th>
                                    <th> Role</th>
                                    <th> Action</th>
                                </tr>
                                @foreach ($adminList as $adminList)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $adminList->name }}</td>
                                    <td>{{ $adminList->username }}</td>
                                    <td>{{ $adminList->email }}</td>
                                    <td>{{ $adminList->role_id }}</td>
                                    <td>
                                        <a href="{{route('admin.show',$adminList->id)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('admin.edit',$adminList->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('admin.delete',$adminList->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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
