@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="{{ route('home')}}" class="nav-link active" aria-current="page">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#home"></use>
                                        </svg>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('category.index')}}" class="nav-link link-dark">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#speedometer2"></use>
                                        </svg>
                                        Category
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('products.index')}}" class="nav-link link-dark">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#table"></use>
                                        </svg>
                                        Product
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('home.userlist')}}" class="nav-link link-dark">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#grid"></use>
                                        </svg>
                                        User
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
