@extends('layouts.chef')

@section('content')
<div class="container pt-5">
    @if(isset($menu))
    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-outline-info add-button">Edit Menu</a>
    @endif
    <div class="container">
        <h1 class="text-center">Today's Menu</h1>
    </div>
    @if(isset($flash_message))
    <div class="alert alert-primary" role="alert">
        {{ $flash_message }}
    </div>
    @endif
    <div class="d-flex justify-content-center">
        @if(empty($menu))
        <div class="alert alert-danger col-md-12 text-center h4 p-5">
            You haven't created today's menu. <a href="{{ route('menu.create') }}"><button class="btn btn-success">Click Me</button></a> to create today's menu.
        </div>
        @else
        <table class="table table-striped text-center">
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Category</th>
            </tr>
            @foreach($menu->items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</div>

@endsection
