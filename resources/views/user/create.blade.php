@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="pull-right mt-3 ms-4">
                        <div class="pull-left">
                            <h4>Amin Create</h4>
                        </div>
                        <a class="btn btn-primary" href="{{ route('admin.list') }}"> Back</a>
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
                            <form action="{{ route('admin.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name :</strong>
                                            <input type="text" name="adminName" required class="form-control"
                                                placeholder="type here name">
                                        </div>
                                        <div class="form-group">
                                            <strong>User Name :</strong>
                                            <input type="text" name="adminUserName" required class="form-control"
                                                placeholder="type here user name">
                                        </div>
                                        <div class="form-group">
                                            <strong>E-mail :</strong>
                                            <input type="text" name="adminEmail" required class="form-control"
                                                placeholder="type here email">
                                        </div>
                                        <div class="form-group">
                                            <strong>Select Role:</strong>
                                            <select class="form-select" name="role_id" id="category_id" required>
                                                <option value="">Select Role</option>
                                                <option value="2">Guest</option>
                                                <option value="1">Admin</option>
                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <strong>Password :</strong>
                                            <input type="password" name="adminPassword" required class="form-control"
                                                placeholder="type here password">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
