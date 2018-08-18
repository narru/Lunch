@extends('layouts.chef')

@section('content')
<div class="container pt-5">
    <a href="{{ route('item.create') }}" class="btn btn-outline-info add-button">Add Item</a>
    <div class="container">
        <h1 class="text-center">Items Table</h1>
    </div>
    @if(isset($flash_message))
    <div class="alert alert-primary" role="alert">
        {{ $flash_message }}
    </div>
    @endif

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>
                <a href="{{ route('item.show', $item->id ) }}"><button class="btn btn-outline-info btn-sm">Edit</button></a>
                <form method="POST" action="{{ route('item.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </form>            </td>
            </tr>
            @endforeach
        </table>

    </div>

    @endsection
