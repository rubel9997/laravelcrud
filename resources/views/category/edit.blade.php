@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="pull-right mt-3 ms-4">
                        <div class="pull-left">
                            <h4>Updated Category</h4>
                        </div>
                        <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
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

                            <form action="{{ route('category.update', $category->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Title:</strong>
                                            <input type="text" name="title" value="{{ $category->title }}"
                                                class="form-control" placeholder="Title">
                                                @error('title')
                                                <span class="text-danger"> {{ $message }}</span>
                                                @enderror
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
