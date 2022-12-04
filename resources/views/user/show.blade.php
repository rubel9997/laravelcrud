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
                                ID No : {{$adminList->id}} <br>
                                User Name : {{$adminList->name}}<br>
                                User Name : {{$adminList->username}}<br>
                                User Email : {{$adminList->email}}<br>
                                User Role Id : {{$adminList->role_id}}<br>
                            </div>
                            <div class="">
                                <a href="{{ route('admin.list') }}" class="btn btn-info">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
