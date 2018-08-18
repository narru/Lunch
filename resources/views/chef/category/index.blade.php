@extends('layouts.chef')

@section('content')
<div class="container pt-5">
    <a href="{{ route('category.create') }}" class="btn btn-outline-info add-button">Add Category</a>
    <div class="container">
        <h1 class="text-center">Categories Table</h1>
    </div>
    @if(isset($flash_message))
    <div class="alert alert-primary" role="alert">
        {{ $flash_message }}
    </div>
    @endif

    <table class="table table-striped text-center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="{{ route('category.show', $category->id ) }}"><button class="btn btn-outline-success btn-sm">Show</button></a>
                <a href="{{ route('category.edit', $category->id ) }}"><button class="btn btn-outline-info btn-sm">Edit</button></a>
                <form method="POST" action="{{ route('category.destroy', $category->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>

@endsection
