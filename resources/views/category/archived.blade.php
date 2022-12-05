@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Archived Catergory') }}</div>
                    <div class="card-body">
                        <div class="pull-right mt-2 ms-2">
                            <a class="btn btn-success" href="{{ route('category.index') }}"> Back</a>
                        </div>

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
                                @foreach ($categoryArchivedData as $category)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>

                                        <form action="{{ route('category.restore',$category->id) }}" method="POST">
                                            @csrf
                                            <a href="{{ route('category.restore',$category->id) }}" onclick="return confirm('Are You Sure!?')" class="btn btn-info">Restore</a>
                                        </form>
                                        <form action="{{ route('category.forceDelete',$category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('category.forceDelete',$category->id) }}" onclick="return confirm('Are you sure to delete forever?')" class="btn btn-danger">Delete Forever</a>
                                        </form>
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
