@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="pull-right mt-2 ms-2">
                        <a class="btn btn-info" href="{{ route('home') }}"> Dashboard</a>
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
                                </tr>
                                @foreach ($userlists as $userlist)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $userlist->name }}</td>
                                    <td>{{ $userlist->username }}</td>
                                    <td>{{ $userlist->email }}</td>
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
